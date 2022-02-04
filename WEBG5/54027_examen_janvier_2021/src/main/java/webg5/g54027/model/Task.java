package webg5.g54027.model;

import java.util.List;

import javax.persistence.Entity;
import javax.persistence.Id;
import javax.persistence.ManyToMany;

import lombok.Data;
import lombok.NoArgsConstructor;

import javax.persistence.GeneratedValue;
import javax.persistence.SequenceGenerator;
import javax.validation.constraints.NotNull;

@Entity
@Data
@NoArgsConstructor
public class Task {
    @Id
    @GeneratedValue(generator = "seq")
    @SequenceGenerator(name = "seq", initialValue = 3)
    private int id;

    @NotNull
    private String description;

    @ManyToMany
    private List<Student> students;
}
