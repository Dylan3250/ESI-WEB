package dylanbricar.pae.test;

import javax.validation.constraints.Size;

import org.junit.jupiter.api.Test;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.test.context.SpringBootTest;

import dylanbricar.pae.model.Genre;
import dylanbricar.pae.model.Section;
import dylanbricar.pae.model.Student;

@SpringBootTest
public class StudentTests {

	@Autowired
	private BeanValidationUtil<Student> validator;

	@Test
	public void loginValid() {
		Student student = new Student(1000L, "name", Genre.F, Section.GESTION, null);
		validator.assertIsValid(student);
	}

	@Test
	public void loginSizeLessThan1Error() {
		Student student = new Student(1000L, "a", Genre.F, Section.GESTION, null);
		validator.assertHasError(student, "name", Size.class);
	}

	// On peut pas tester deux fois la même chose, la règle du dessus vérifie le minimum qui sera d'office supérieur à "blank"
	// @Test
    // public void nameBlankError() {
	// 	Student student = new Student(1000L, "", Genre.F, Section.GESTION, null);
    //     validator.assertHasError(student, "name", NotBlank.class);
    // }
}