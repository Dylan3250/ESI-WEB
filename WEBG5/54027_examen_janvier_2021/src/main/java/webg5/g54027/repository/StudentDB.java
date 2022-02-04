package webg5.g54027.repository;

import java.util.List;

import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.CrudRepository;

import webg5.g54027.model.Student;

public interface StudentDB extends CrudRepository<Student, Integer> {

    @Query("SELECT u.name FROM Student u WHERE (SELECT COUNT(s.name) FROM Student s JOIN s.tasks c WHERE s.name = u.name GROUP BY s.name) >= (SELECT COUNT(t.id) FROM Task t)")
    public List<Object[]> findAllStudentDoneTask();
}
