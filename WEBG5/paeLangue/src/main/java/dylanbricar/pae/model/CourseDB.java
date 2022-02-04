package dylanbricar.pae.model;

import java.util.List;

import org.springframework.data.repository.CrudRepository;

public interface CourseDB extends CrudRepository<Course, String> {
    List<Course> findByTitleContaining(String title);
    List<Course> findByCreditsGreaterThanEqual(int credits);
}
