package webg5.g54027.web;

import java.util.Optional;

import javax.validation.Valid;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.validation.Errors;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;

import org.slf4j.Logger;
import org.slf4j.LoggerFactory;

import lombok.RequiredArgsConstructor;
import webg5.g54027.model.Commit;
import webg5.g54027.model.Repository;
import webg5.g54027.repository.CommitDB;
import webg5.g54027.repository.RepositoryDB;

@Controller
@RequiredArgsConstructor
public class WebController {
    private static final Logger logger = LoggerFactory.getLogger("PAE Controller");

    private final RepositoryDB repositoryDB;
    private final CommitDB commitDB;

    @GetMapping("/")
    public String home(Model model) {
        return "home";
    }

    @GetMapping("/depots")
    public String depots(Model model) {
        model.addAttribute("repositories", repositoryDB.findAll());
        return "depots";
    }

    @GetMapping("/depot/{repositoryId}")
    public String depot(@PathVariable(value = "repositoryId") int repositoryId, Model model) {
        model.addAttribute("repositoryId", repositoryId);
        return "depot";
    }

    @PostMapping("/commit/add")
    public String addCommit(String message, Integer repositoryId) {

        Optional<Repository> repository = repositoryDB.findById(repositoryId);
        if (!repository.isPresent()) {
            throw new IllegalArgumentException("Error when creation of commit !");
        }
        var commit = new Commit(message, repository.get());
        commitDB.save(commit);
        return "redirect:/depot/" + repositoryId;
    }
}
