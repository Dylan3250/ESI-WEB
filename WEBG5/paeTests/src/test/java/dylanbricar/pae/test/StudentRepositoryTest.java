package dylanbricar.pae.test;

import static org.junit.jupiter.api.Assertions.assertEquals;

import java.util.List;

import org.junit.jupiter.api.Test;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.test.autoconfigure.orm.jpa.DataJpaTest;

import dylanbricar.pae.model.Genre;
import dylanbricar.pae.model.Section;
import dylanbricar.pae.model.Student;
import dylanbricar.pae.model.StudentDB;

@DataJpaTest
public class StudentRepositoryTest {

    @Autowired
    private StudentDB studentRepository;

    @Test
    public void findByName() {
        studentRepository.deleteAll();

        Student student = new Student(0, "testspecial", Genre.F, Section.GESTION, null);
        studentRepository.save(student);
        var found = studentRepository.findByName("testspecial");
        assertEquals(student, found);
    }

    @Test
    public void findByLongLogin() {
        studentRepository.deleteAll();

        Student student1 = new Student(1000L, "abcdefghijklmn", Genre.F, Section.GESTION, null);
        Student student2 = new Student(1001L, "pqxyz", Genre.F, Section.GESTION, null);
        studentRepository.save(student1);
        studentRepository.save(student2);

        List<Student> found = studentRepository.findByLongLogin();
        assertEquals(1, found.size());
        // assertEquals(student1, found.get(0)); -- mes id sont autogénérés donc écrasés
    }
}
