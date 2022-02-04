package dylanbricar.pae;

import javax.sql.DataSource;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.context.annotation.Configuration;
import org.springframework.security.config.annotation.authentication.builders.AuthenticationManagerBuilder;
import org.springframework.security.config.annotation.web.builders.HttpSecurity;
import org.springframework.security.config.annotation.web.configuration.EnableWebSecurity;
import org.springframework.security.config.annotation.web.configuration.WebSecurityConfigurerAdapter;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.GetMapping;

@Configuration
@EnableWebSecurity
public class SecurityConfig extends WebSecurityConfigurerAdapter {
    @Controller
    public class SecurityCtrl {
        @GetMapping("/login")
        public String login() {
            return "login";
        }
    }

    @Autowired
    private DataSource dataSource;

    @Override
    protected void configure(AuthenticationManagerBuilder auth) throws Exception {
        auth.jdbcAuthentication()
                .dataSource(dataSource)
                .usersByUsernameQuery(
                        "select username, password, enabled from user where username=?")
                .authoritiesByUsernameQuery(
                        "select username, authority" + " from authority where username=?");
    }

    // ==================== Login avec une database
    // @Autowired
    // private DataSource dataSource;
    //
    // @Override
    // protected void configure(AuthenticationManagerBuilder auth) throws Exception
    // {
    // auth.jdbcAuthentication()
    // .dataSource(dataSource)
    // .withDefaultSchema()
    // .withUser(User.withUsername("user")
    // .password("{noop}user")
    // .authorities("USER"));
    // }

    // ========================= Login coddés en dur
    // @Override
    // protected void configure(AuthenticationManagerBuilder auth) throws Exception
    // {
    // auth.inMemoryAuthentication()
    // .withUser("enseignant")
    // .password("{noop}enseignant") // noop = non chiffré
    // .authorities("ENSEIGNANT") //
    // .and()
    // .withUser("etudiant")
    // .password("{noop}etudiant")
    // .authorities("ETUDIANT")
    // .and()
    // .withUser("secretariat")
    // .password("{noop}secretariat")
    // .authorities("SECRETARIAT");
    // }

    @Override
    protected void configure(HttpSecurity http) throws Exception {
        http.authorizeRequests()
                .antMatchers("/login**", "/css/**", "/js/**", "/img/**").permitAll()
                .requestMatchers(req -> req.getRequestURI().contains("detail")).hasAuthority("SECRETARIAT")
                .anyRequest().authenticated()
                .and()
                .formLogin().loginPage("/login")
                .and()
                .exceptionHandling().accessDeniedPage("/")
                .and()
                .logout().logoutSuccessUrl("/");
    }

}
