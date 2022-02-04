package dylanbricar.pae.model;

import java.util.List;

import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.CrudRepository;

public interface StudentDB extends CrudRepository<Student, Long> {
    public Student findByName(String name);

    @Query("select u FROM Student u WHERE length(u.name)>8")
    public List<Student> findByLongLogin();

    @Query("SELECT s.name FROM Student s")
    public List<Student> findAllNameStudent();

    @Query("SELECT s.name, s.matricule FROM Student s")
    public List<Object> findAllNameAndIdStudent();

    //@Query("SELECT SUM(c.credits), s.name FROM Student s JOIN s.Course_Linked_Students cl ON s.matricule = cl.Linked_Students_Matricule JOIN COURSE c ON c.id = cl.Liked_Courses_Id GROUP BY s.name")
    @Query("SELECT SUM(c.credits), s.name FROM Student s JOIN s.likedCourses c GROUP BY s.name")
    public List<Object[]> findAllNameAndEtcStudent();

    //@Query("SELECT SUM(c.credits) totCredits, s.name FROM Student s JOIN Course_Linked_Students cl ON s.matricule = cl.Linked_Students_Matricule JOIN COURSE c ON c.id = cl.liked_courses_id GROUP BY s.name HAVING totCredits > :credits")
    @Query("SELECT SUM(c.credits), s.name FROM Student s JOIN s.likedCourses c GROUP BY s.name HAVING SUM(c.credits) > :credits")
    public List<Object[]> findAllNameAndEtcStudentGreaterThan(Long credits);

    public List<Student> findByNameContaining(String name);
}
