package dylanbricar.pae.web;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;

@Controller
public class HomeController {

    @GetMapping("/")
    public String home(Model model) {
        model.addAttribute("username", "MCD");
        return "home";
    }

    @GetMapping("/home/{username}")
    public String home(@PathVariable(value = "username") String username, Model model) {
        model.addAttribute("username", username);
        return "home";
    }
}
