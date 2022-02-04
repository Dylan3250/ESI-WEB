package dylanbricar.pae.business;

import java.util.Arrays;
import java.util.List;

import org.springframework.stereotype.Service;

import dylanbricar.pae.model.Course;

@Service
public class Pae {
    public List<Course> getCourses() {
        return Arrays.asList(new Course("INT1", "Introductions", 10), new Course("MAT1", "Mathématiques II", 3),
                new Course("CAI1", "Anglais I", 2), new Course("DEV1", "Developpement I", 10),
                new Course("DEV2", "Developpement II", 10), new Course("WEBG2", "Developpement Web I", 5));
    }

    public Course getCourse(String sigle) {
        for (Course course : getCourses()) {
            if (course.getId().equals(sigle)) {
                return course;
            }
        }
        throw new IllegalArgumentException("Given sigle is not a course : " + sigle);
    }
}
