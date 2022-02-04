package dylanbricar.pae.web;

import dylanbricar.pae.business.Pae;
import dylanbricar.pae.dto.ListCourses;
import dylanbricar.pae.model.Course;
import dylanbricar.pae.model.CourseDB;
import lombok.RequiredArgsConstructor;

import javax.validation.Valid;

import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.validation.Errors;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.client.RestTemplate;

@Controller
@RequiredArgsConstructor
public class PaeController {
    private static final Logger logger = LoggerFactory.getLogger("PAE Controller");
    @Autowired 
    Pae pae;

    @Autowired
    private CourseDB courseDB;

    @GetMapping("/courses")
    public String home(Model model) {
        model.addAttribute("courses", pae.getCourses());
        model.addAttribute("course", new Course());
        return "courses";
    }

    @GetMapping("/details/{courseId}")
    public String home(@PathVariable(value = "courseId") String courseId, Model model) {
        return "details";
    }

    @PostMapping("/courses/add")
    public String addCourse(@Valid Course course, Errors errors) {
        if(errors.hasErrors()) {
            logger.error("ERREUR : impossible d'ajouter un cours");
            return "courses";
        }
        logger.info("Ajout d'un cours " + course);
        courseDB.save(course);
        return "redirect:/courses";
    }

    @GetMapping("/courses/rest/template")
    public String restCoursesTemplate(Model model) {
        RestTemplate restTemplate = new RestTemplate();
        ListCourses courses = restTemplate.getForObject("http://localhost:8080/api/courses/template", ListCourses.class);

        model.addAttribute("courses", courses.getCourses());
        model.addAttribute("course", new Course());
        return "courses";
    }

    @GetMapping("/courses/rest")
    public String restCourses(Model model) {
        model.addAttribute("course", new Course());
        return "coursesRest";
    }
}
