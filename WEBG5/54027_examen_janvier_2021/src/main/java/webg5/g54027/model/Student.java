package webg5.g54027.model;

import java.util.List;

import javax.persistence.Entity;
import javax.persistence.Id;
import javax.persistence.ManyToMany;

import lombok.Data;
import lombok.NoArgsConstructor;

import javax.validation.constraints.NotNull;

@Entity
@Data
@NoArgsConstructor
public class Student {
    @Id
    private int number;

    @NotNull
    private String name;

    @ManyToMany(mappedBy = "students")
    private List<Task> tasks;
}
