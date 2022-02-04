package webg5.g54027.web;

import java.util.List;

import org.springframework.web.bind.annotation.CrossOrigin;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import lombok.RequiredArgsConstructor;
import webg5.g54027.repository.TrackDB;

@RestController
@RequestMapping(path = "/api")
@CrossOrigin(origins = "*")
@RequiredArgsConstructor
public class APIController {
    private final TrackDB trackDb;

    @GetMapping("/trackMostListened/{greaterThan}")
    public List<Object[]> getAllStudentDoneTask(@PathVariable(value = "greaterThan") int greaterThan) {
        return trackDb.findAllMostListenedThan(greaterThan);
    }
}
