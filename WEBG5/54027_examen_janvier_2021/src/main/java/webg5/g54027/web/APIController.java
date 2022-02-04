package webg5.g54027.web;

import java.util.ArrayList;
import java.util.List;
import java.util.Optional;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.CrossOrigin;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import lombok.RequiredArgsConstructor;
import webg5.g54027.repository.StudentDB;

@RestController
@RequestMapping(path = "/api")
@CrossOrigin(origins = "*")
@RequiredArgsConstructor
public class APIController {
    private final StudentDB studentDB;

    @GetMapping("/studentsTasks")
    public List<Object[]> getAllStudentDoneTask() {
        return studentDB.findAllStudentDoneTask();
    }
}
