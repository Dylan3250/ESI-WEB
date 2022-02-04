package dylanbricar.pae.model;

import javax.persistence.Entity;
import javax.persistence.Id;
import javax.validation.constraints.Positive;
import javax.validation.constraints.Size;

import groovyjarjarantlr4.v4.runtime.misc.NotNull;
import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.Getter;
import lombok.NoArgsConstructor;
import lombok.Setter;
import lombok.ToString;

@AllArgsConstructor
@NoArgsConstructor
@ToString
@Entity
@Data
public class Course {
    @Id @Getter @Setter
    private String id;

    @Getter @Setter @NotNull @Size(min=2, max=50, message="doit faire entre 2 et 50 caractères")
    private String title;

    @Getter @Setter @Positive
    private int credits;
}
