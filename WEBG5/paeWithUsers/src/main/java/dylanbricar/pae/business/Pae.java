package dylanbricar.pae.business;

import java.util.ArrayList;
import java.util.List;
import java.util.Optional;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import dylanbricar.pae.model.Course;
import dylanbricar.pae.model.CourseDB;

import dylanbricar.pae.model.Student;
import dylanbricar.pae.model.StudentDB;

@Service
public class Pae {
    @Autowired
    private CourseDB courseDB;

    @Autowired
    private StudentDB studentDB;

    public List<Course> getCourses() {
        List<Course> result = new ArrayList<>();
        courseDB.findAll().forEach(result::add);
        return result;
    }

    public Course getCourse(String id) {
        Optional<Course> s = courseDB.findById(id);
        if (s.isPresent()) {
            return s.get();
        } else {
            throw new IllegalArgumentException("Course id " + id + " doesn't found");
        }
    }

    public List<Student> getStudents() {
        List<Student> result = new ArrayList<>();
        studentDB.findAll().forEach(result::add);
        return result;
    }

    public Student getStudent(long id) {
        Optional<Student> s = studentDB.findById(id);
        if (s.isPresent()) {
            return s.get();
        } else {
            throw new IllegalArgumentException("Student id " + id + " doesn't found");
        }
    }
}
