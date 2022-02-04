package dylanbricar.pae.web;

import dylanbricar.pae.business.Pae;
import dylanbricar.pae.dto.ListCourses;
import dylanbricar.pae.model.Course;
import dylanbricar.pae.model.CourseDB;
import dylanbricar.pae.model.Genre;
import dylanbricar.pae.model.Section;
import dylanbricar.pae.model.Student;
import dylanbricar.pae.model.StudentDB;
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
    private Pae pae;

    @Autowired
    private CourseDB courseDB;

    @Autowired
    private StudentDB studentDB;

    @GetMapping("/courses")
    public String home(Model model) {
        model.addAttribute("courses", pae.getCourses());
        model.addAttribute("course", new Course());
        return "courses";
    }

    @GetMapping("/courses/details/{courseId}")
    public String detailCourses(@PathVariable(value = "courseId") String courseId, Model model) {
        model.addAttribute("course", pae.getCourse(courseId));
        return "courseDetails";
    }

    @PostMapping("/courses/add")
    public String addCourse(@Valid Course course, Errors errors) {
        if (errors.hasErrors()) {
            logger.error("ERREUR : impossible d'ajouter un cours");
            return "courses";
        }
        logger.info("Ajout d'un cours " + course);
        courseDB.save(course);
        return "redirect:/courses";
    }

    @PostMapping("/courses/addStudent")
    public String addUserCoursises(Long matricule, String courseId) {
        var course = courseDB.findById(courseId).get();
        var totalStudent = course.getLinkedStudents();
        totalStudent.add(studentDB.findById(matricule).get());
        course.setLinkedStudents(totalStudent);
        courseDB.save(course);
        return "redirect:/courses";
    }

    @GetMapping("/courses/rest/template")
    public String restCoursesTemplate(Model model) {
        RestTemplate restTemplate = new RestTemplate();
        ListCourses courses = restTemplate.getForObject("http://localhost:8080/api/courses/template",
                ListCourses.class);

        model.addAttribute("courses", courses.getCourses());
        model.addAttribute("course", new Course());
        return "courses";
    }

    @GetMapping("/courses/rest")
    public String restCourses(Model model) {
        model.addAttribute("course", new Course());
        return "coursesRest";
    }

    @GetMapping("/students")
    public String homeStudent(Model model) {
        model.addAttribute("students", pae.getStudents());
        // INSERT INTO COURSE_LIKE VALUES(1, 'INT1');
        var s = new Student();
        s.setGenre(Genre.M);
        s.setSection(Section.GESTION);
        model.addAttribute("student", s);
        return "students";
    }

    @PostMapping("/students/add")
    public String addStudent(@Valid Student student, Errors errors) {
        if (errors.hasErrors()) {
            logger.error("ERREUR : impossible d'ajouter un étudiant");
            return "students";
        }
        logger.info("Ajout d'un étudiant " + student);
        studentDB.save(student);
        return "redirect:/students";
    }

    @PostMapping("/students/search")
    public String searchStudent(String name, Model model) {
        logger.info("Recherche d'un étudiant : " + name);
        var students = studentDB.findByNameContaining(name);
        System.out.println(students);
        model.addAttribute("students", students);

        var s = new Student();
        s.setGenre(Genre.M);
        s.setSection(Section.GESTION);
        model.addAttribute("student", s);
        return "students";
    }

    @GetMapping("/students/details/{studentId}")
    public String detailStudent(@PathVariable(value = "studentId") long studentId, Model model) {
        System.out.println(pae.getStudent(studentId));

        model.addAttribute("student", pae.getStudent(studentId));
        return "studentDetails";
    }
}
