package webg5.g54027.model;

import java.util.List;

import javax.persistence.Entity;
import javax.persistence.Id;
import javax.persistence.JoinColumn;
import javax.persistence.ManyToOne;
import javax.persistence.OneToMany;
import javax.validation.constraints.NotNull;

import com.fasterxml.jackson.annotation.JsonManagedReference;

import lombok.Data;
import lombok.NoArgsConstructor;

import javax.persistence.GeneratedValue;
import javax.persistence.SequenceGenerator;

@Entity
@Data
@NoArgsConstructor
public class Repository {
    @Id
    @GeneratedValue(generator = "seq")
    @SequenceGenerator(name = "seq", initialValue = 3)
    private int id;

    @NotNull
    private String name;

    @JsonManagedReference
    @ManyToOne
    @JoinColumn(nullable = false)
    private Member member;

    @JsonManagedReference
    @OneToMany(mappedBy = "repository")
    private List<Commit> commits;
}
