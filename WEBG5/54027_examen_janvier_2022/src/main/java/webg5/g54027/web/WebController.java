package webg5.g54027.web;

import javax.validation.Valid;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.validation.Errors;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;

import lombok.RequiredArgsConstructor;
import webg5.g54027.model.Track;
import webg5.g54027.repository.ArtistDB;
import webg5.g54027.repository.TrackDB;

@Controller
@RequiredArgsConstructor
public class WebController {

    private final ArtistDB artistDb;
    private final TrackDB trackDb;

    @GetMapping("/")
    public String home(Model model) {
        return "home";
    }

    @GetMapping("/artistes")
    public String artistes(Model model) {
        model.addAttribute("artists", artistDb.findAll());
        return "artistes";
    }

    @GetMapping("/artist/{artistLogin}")
    public String board(@PathVariable(value = "artistLogin") String artistLogin, Model model) {
        model.addAttribute("artist", artistDb.findById(artistLogin).get());
        model.addAttribute("track", new Track());
        return "artist";
    }

    @PostMapping("/artist/update/{artistLogin}/{trackId}")
    public String updateArtist(
            @PathVariable(value = "artistLogin") String artistLogin,
            @PathVariable(value = "trackId") int trackId,
            @Valid Track track,
            Errors errors, Model model) {

        if (errors.hasErrors()) {
            model.addAttribute("artist", artistDb.findById(artistLogin).get());
            return "artist";
        }

        if (!trackDb.findById(trackId).isPresent()) {
            throw new IllegalArgumentException("Error when enditing the track !");
        }

        var oldTrack = trackDb.findById(trackId).get();
        oldTrack.setStream(oldTrack.getStream() + track.getStream());
        trackDb.save(oldTrack);
        return "redirect:/artist/" + artistLogin;
    }

}
