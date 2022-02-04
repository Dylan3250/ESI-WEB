package dylanrbricar.rest.controller;

import java.util.Date;

import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import dylanrbricar.rest.model.Info;

@RestController
@RequestMapping(path = "/api/hellojson")
public class HelloRestJSON {
    @GetMapping
    public Info hello() {
        return new Info("Hello, world !", new Date());
    }
}