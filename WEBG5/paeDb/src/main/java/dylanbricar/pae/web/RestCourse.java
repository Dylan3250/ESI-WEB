package dylanbricar.pae.web;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import dylanbricar.pae.business.Pae;
import dylanbricar.pae.dto.ListCourses;
import dylanbricar.pae.model.Course;

@RestController
@RequestMapping(path="/api/courses")
public class RestCourse {
    @Autowired Pae pae;
    
    @GetMapping("/template")
    public ListCourses listCoursesTemplate() {
        ListCourses c = new ListCourses();
        for(Course course : pae.getCourses()) {
            c.add(course);
        }
        return c;
    } 
    
    @GetMapping
    public List<Course> listCourses() {
        return pae.getCourses();
    } 
}
