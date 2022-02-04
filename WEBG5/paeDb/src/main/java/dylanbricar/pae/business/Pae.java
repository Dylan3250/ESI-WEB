package dylanbricar.pae.business;

import java.util.ArrayList;
import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import dylanbricar.pae.model.Course;
import dylanbricar.pae.model.CourseDB;

@Service
public class Pae {
    @Autowired
    private CourseDB courseDB;

    public List<Course> getCourses() {        
        List<Course> result = new ArrayList<>();
        courseDB.findAll().forEach(result::add);
        return result;
    }
}
