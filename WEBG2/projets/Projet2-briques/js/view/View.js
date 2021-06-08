'use strict';
/**
 * Displays all elements of the game.
 */
class View {
    /**
     * Gives the distance of the scene from at the left edge of the window.
     * @returns {number} the distance of the scene and the left edge of window.
     */
    sceneLeft() {
        return $("#scene").offset().left;
    };

    /**
     * Adds a new sprite on the game.
     * @param {Sprite} sprite : the new sprite to display
     */
    addSprite(sprite) {
        $("#scene").append($("<span>").attr({
            id: sprite.id,
            class: sprite.type
        }));
        this.updateSprite(sprite);
    };

    /**
     * Updates the position of the sprite
     * @param {Sprite} sprite : the given sprite to update
     */
    updateSprite(sprite) {
        $("#" + sprite.id).css({
            "left": sprite.topLeft.x,
            "top": sprite.topLeft.y,
            "height": sprite._dimension.height,
            "width": sprite._dimension.width
        });
    };

    /**
     * Removes an array of sprite on the game.
     * @param {Sprite[]} sprite : the array of sprite to remove
     */
    removeSprite(sprite) {
        sprite.map((item) => $("#" + item.id).remove());
    };

    /**
     * Displays the wall of sprites on the game.
     * @param {Sprite[]} sprite : the array of sprite to display
     */
    addSpriteWall(sprite) {
        $("#scene .brick").remove();
        sprite.map((item) => this.addSprite(item));
    };

    /**
     * Displays the new score of the player on the game.
     * @param {number} score : the given score of the player
     */
    updateScore(score) {
        $("#score").text(score);
    }

    /**
     * Displays the level on the game.
     * @param {number} level : the given level of the player
     */
    displayLevel(level) {
        $("#level").text("Niveau " + level);
    }

    /**
     * Shows the given message on center of scene.
     * @param {String} message : the given message to display
     */
    showMessage(message) {
        $("#message").show().text(message);
    };

    /**
     * Hides the emplacement for message on center of scene.
     */
    hideMessage() {
        $("#message").hide().text();
    };

    /**
     * Displays the number of life in the page.
     * @param {number} nbLife : the number of life left to display
     */
    displayLife(nbLife) {
        if ($("#life").children().length != nbLife) {
            $("#life").children().remove();
            for (let i = 0; i < nbLife; i++) {
                $("#life").append(
                    $("<span>").append($('<i>').addClass("icon heart"))
                );
            };
        };
    };
};
