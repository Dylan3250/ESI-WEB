package webg5.g54027;

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

    @Override
    protected void configure(HttpSecurity http) throws Exception {
        http.authorizeRequests()
                .antMatchers("/login**", "/css/**", "/js/**", "/img/**").permitAll()
                .anyRequest().hasAuthority("PROF")
                .and()
                .formLogin().loginPage("/login")
                .and()
                .exceptionHandling().accessDeniedPage("/")
                .and()
                .logout().logoutSuccessUrl("/");

        // this will ignore only h2-console csrf, spring security 4+
        http.csrf().ignoringAntMatchers("/h2-console/**");
        // this will allow frames with same origin which is much more safe
        http.headers().frameOptions().sameOrigin();
    }

}
