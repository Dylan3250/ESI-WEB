package dylanbricar.pae.dto;

import java.util.ArrayList;
import java.util.List;

import dylanbricar.pae.model.Student;
import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;

@Data
@NoArgsConstructor
@AllArgsConstructor
public class ListStudents {
    private List<Student> students = new ArrayList<>();

    public void add(Student student) {
        students.add(student);
    }
}
