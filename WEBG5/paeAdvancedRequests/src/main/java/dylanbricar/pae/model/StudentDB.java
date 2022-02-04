package dylanbricar.pae.model;

import java.util.List;

import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.CrudRepository;

public interface StudentDB extends CrudRepository<Student, Long> {
    @Query("SELECT s.name FROM Student s")
    List<Student> findAllNameStudent();

    @Query("SELECT s.name, s.matricule FROM Student s")
    List<Object> findAllNameAndIdStudent();

    //@Query("SELECT SUM(c.credits), s.name FROM Student s JOIN s.Course_Linked_Students cl ON s.matricule = cl.Linked_Students_Matricule JOIN COURSE c ON c.id = cl.Liked_Courses_Id GROUP BY s.name")
    @Query("SELECT SUM(c.credits), s.name FROM Student s JOIN s.likedCourses c GROUP BY s.name")
    List<Object[]> findAllNameAndEtcStudent();

    //@Query("SELECT SUM(c.credits) totCredits, s.name FROM Student s JOIN Course_Linked_Students cl ON s.matricule = cl.Linked_Students_Matricule JOIN COURSE c ON c.id = cl.liked_courses_id GROUP BY s.name HAVING totCredits > :credits")
    @Query("SELECT SUM(c.credits), s.name FROM Student s JOIN s.likedCourses c GROUP BY s.name HAVING SUM(c.credits) > :credits")
    List<Object[]> findAllNameAndEtcStudentGreaterThan(Long credits);

    List<Student> findByNameContaining(String name);
}
