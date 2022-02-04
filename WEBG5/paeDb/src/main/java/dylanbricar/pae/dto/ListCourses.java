package dylanbricar.pae.dto;

import java.util.ArrayList;
import java.util.List;

import dylanbricar.pae.model.Course;
import lombok.AllArgsConstructor;
import lombok.Data;

@Data
@AllArgsConstructor
public class ListCourses {
    private List<Course> courses;

    public ListCourses() {
        courses = new ArrayList<>();
    }

    public void add(Course course) {
        courses.add(course);
    }
}
