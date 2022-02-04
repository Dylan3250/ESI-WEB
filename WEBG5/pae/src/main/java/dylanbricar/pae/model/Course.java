package dylanbricar.pae.model;

import java.io.Serializable;

import javax.validation.constraints.Max;
import javax.validation.constraints.Min;
import javax.validation.constraints.Positive;
import javax.validation.constraints.Size;

import groovyjarjarantlr4.v4.runtime.misc.NotNull;
import lombok.AllArgsConstructor;
import lombok.Getter;
import lombok.NoArgsConstructor;
import lombok.Setter;
import lombok.ToString;

@AllArgsConstructor
@NoArgsConstructor
@ToString
public class Course implements Serializable {
    @Getter @Setter @Min(0) @Max(100000)
    private String id;

    @Getter @Setter @NotNull @Size(min=2, max=50, message="doit faire entre 2 et 50 caractères")
    private String title;

    @Getter @Setter @Positive
    private int credits;
}
