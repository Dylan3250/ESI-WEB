package webg5.g54027.web;

import java.util.Optional;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;

import lombok.RequiredArgsConstructor;
import webg5.g54027.model.Student;
import webg5.g54027.model.Task;
import webg5.g54027.repository.StudentDB;
import webg5.g54027.repository.TaskDB;

@Controller
@RequiredArgsConstructor
public class WebController {
    private final StudentDB studentDB;
    private final TaskDB taskDB;

    @GetMapping("/")
    public String home(Model model) {
        return "home";
    }

    @GetMapping("/board")
    public String board(Model model) {
        model.addAttribute("students", studentDB.findAll());
        model.addAttribute("tasks", taskDB.findAll());
        return "board";
    }

    @GetMapping("/student/{studentId}")
    public String board(@PathVariable(value = "studentId") int studentId, Model model) {
        model.addAttribute("student", studentDB.findById(studentId).get());
        model.addAttribute("tasks", taskDB.findAll());
        return "student";
    }

    @PostMapping("/student/doneTask")
    public String doneTask(Integer taskId, Integer studentId) {
        if (!studentDB.findById(studentId).isPresent() || !taskDB.findById(taskId).isPresent()) {
            throw new IllegalArgumentException("Error when enditing the task !");
        }
        Student student = studentDB.findById(studentId).get();
        Task task = taskDB.findById(taskId).get();

        student.getTasks().add(task);
        task.getStudents().add(student);

        studentDB.save(student);
        taskDB.save(task);
        return "redirect:/student/" + studentId;
    }

}
