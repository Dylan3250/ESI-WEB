package webg5.g54027.model;

import java.util.List;

import javax.persistence.Entity;
import javax.persistence.Id;
import javax.persistence.OneToMany;
import javax.validation.constraints.NotNull;

import com.fasterxml.jackson.annotation.JsonBackReference;

import lombok.Data;
import lombok.NoArgsConstructor;

@Entity
@Data
@NoArgsConstructor
public class Artist {
    @Id
    private String login;

    @NotNull
    private String name;

    @JsonBackReference
    @OneToMany(mappedBy = "artist")
    private List<Track> tracks;
}
