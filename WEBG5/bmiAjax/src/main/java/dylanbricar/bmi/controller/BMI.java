package dylanbricar.bmi.controller;

import org.springframework.web.bind.annotation.GetMapping;

public class BMI {
    @GetMapping("/")
    public String index() {
        return "index";
    }
}
