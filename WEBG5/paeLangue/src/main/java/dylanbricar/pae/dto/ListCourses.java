package dylanbricar.pae.dto;

import java.util.ArrayList;
import java.util.List;

import dylanbricar.pae.model.Course;
import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;

@Data
@NoArgsConstructor
@AllArgsConstructor
public class ListCourses {
    private List<Course> courses = new ArrayList<>();

    public void add(Course course) {
        courses.add(course);
    }
}
