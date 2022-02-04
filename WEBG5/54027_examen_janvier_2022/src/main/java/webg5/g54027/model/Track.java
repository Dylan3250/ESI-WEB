package webg5.g54027.model;

import javax.persistence.Entity;
import javax.persistence.Id;
import javax.persistence.JoinColumn;
import javax.persistence.ManyToOne;
import javax.validation.constraints.NotBlank;
import javax.validation.constraints.Positive;

import com.fasterxml.jackson.annotation.JsonManagedReference;

import javax.persistence.GeneratedValue;
import javax.persistence.SequenceGenerator;

import lombok.Data;

@Entity
@Data
public class Track {
    @Id
    @GeneratedValue(generator = "seq")
    @SequenceGenerator(name = "seq", initialValue = 9)
    private int id;

    @NotBlank
    private String title;

    @Positive(message = "Ne peut être nul ou négatif")
    private int stream;

    @JsonManagedReference
    @ManyToOne
    @JoinColumn(nullable = false)
    private Artist artist;

    public Track() {
        this.id = 0;
        this.title = "useless";
        this.stream = 0;
        this.artist = null;
    }
}
