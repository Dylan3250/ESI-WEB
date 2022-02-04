package dylanbricar.pae.test;

import static org.junit.jupiter.api.Assertions.assertEquals;

import org.junit.jupiter.api.Test;
import org.mockito.Mockito;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.test.context.SpringBootTest;
import org.springframework.boot.test.mock.mockito.MockBean;

import dylanbricar.pae.business.Pae;
import dylanbricar.pae.model.Genre;
import dylanbricar.pae.model.Section;
import dylanbricar.pae.model.Student;
import dylanbricar.pae.model.StudentDB;

@SpringBootTest
public class PaeServiceTest {

    @Autowired
    private Pae paeService;

    @MockBean
    private StudentDB studentRepository;

    @Test
    public void getUserByName() {
        String name = "MCD";
        Student student = new Student(1000L, name, Genre.F, Section.GESTION, null);
        Mockito.when(studentRepository.findByName(name)).thenReturn(student);
        Student found = paeService.getStudentByName(student.getName());
        assertEquals(found.getName(), name);
    }
}
