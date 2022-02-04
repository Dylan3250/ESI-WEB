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
import webg5.g54027.model.Repository;
import webg5.g54027.repository.RepositoryDB;

@RestController
@RequestMapping(path = "/api")
@CrossOrigin(origins = "*")
@RequiredArgsConstructor
public class APIController {
    private final RepositoryDB repositoryDB;

    @GetMapping("/depots")
    public Iterable<Repository> getAllRepositories() {
        return repositoryDB.findAll();
    }

    @GetMapping("/depot/{repositoryId}")
    public Optional<Repository> getRepository(@PathVariable(value = "repositoryId") int repositoryId) {
        return repositoryDB.findById(repositoryId);
    }
}
