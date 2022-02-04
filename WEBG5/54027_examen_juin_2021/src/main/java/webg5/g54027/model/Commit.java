package webg5.g54027.model;

import java.util.Date;

import javax.persistence.Entity;
import javax.persistence.Id;
import javax.persistence.JoinColumn;
import javax.persistence.ManyToOne;
import javax.validation.constraints.NotNull;

import com.fasterxml.jackson.annotation.JsonBackReference;

import org.springframework.format.annotation.DateTimeFormat;

import lombok.Data;
import lombok.NoArgsConstructor;

import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.SequenceGenerator;

@Entity
@Data
@NoArgsConstructor
public class Commit {
    @Id
    @GeneratedValue(generator = "seq")
    @SequenceGenerator(name = "seq", initialValue = 3)
    private int number;

    private Date date;

    @NotNull
    private String message;

    @JsonBackReference
    @ManyToOne
    @JoinColumn(nullable = false)
    private Repository repository;

    public Commit(@NotNull String message, Repository repository) {
        this.message = message;
        this.repository = repository;
        this.date = new Date();
    }   
}
