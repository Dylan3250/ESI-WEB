'use strict';
/**
 * Defines the game with its mechanisms (ball, paddle, bricks, player and level).
 */
class Game {
    /**
     * Defines the game with ball, paddle, bricks, the level and the player.
     * For the ball, there is a new random position x for the ball and static
     * position y. A new random X movement and a static Y movement but always
     * up (for have always same speed).
     * For the paddle, it's placed on the center of the scene and at the bottom.
     */
    constructor() {
        const paddlePos = new Position(
            WIDTH_SCENE / 2 - WIDTH_PADDLE / 2, HEIGHT_SCENE - HEIGHT_PADDLE);
        this._paddle = new Paddle(
            "paddle",
            paddlePos,
            new Dimension(WIDTH_PADDLE, HEIGHT_PADDLE)
        );
        this.resetBall();
        this._currentLevel = 1;
        this.reloadWall();
        this._player = new Player();
    };

    /**
     * Gets the ball on the game.
     * @returns {Ball} the ball on the game
     */
    get ball() {
        return this._ball;
    };

    /**
     * Gets the paddle on the game.
     * @returns {Paddle} the paddle on the game
     */
    get paddle() {
        return this._paddle;
    };

    /**
     * Gets the array of bricks in the game.
     * @returns {Brick[]} the array of bricks in the game
     */
    get wall() {
        return this._wall;
    };

    /**
     * Gets the player of the game.
     * @returns {Player} the player on the game
     */
    get player() {
        return this._player;
    };

    /**
     * Gets the current level of the game.
     * @returns {number} the current level on the game
     */
    get currentLevel() {
        return this._currentLevel;
    };

    /**
     * Increases the level of the game.
     */
    increasesLevel() {
        this._currentLevel += 1;
    };

    /**
     * Moves the paddle according to the center of mouse indicated.
     * @param {number} centerX : the given center of paddle
     */
    paddleMove(centerX) {
        this._paddle.moveTo(centerX);
    };

    /**
     * Moves the ball on the game taking into account the paddle, bricks and
     * updates the player's score if the ball destroys a brick.
     * @returns {Brick[]} the array with destroyed bricks
     */
    ballMove() {
        this._paddleCollision();
        this._ball.move();
        const destroyedBricks = this._brickCollision();
        this._player.addToScore(destroyedBricks.length * PTS_MULTIPLY);
        return destroyedBricks;
    };

    /**
     * Checks if the game is lost (the ball hits the ground) or not.
     * @returns {Boolean} true if the game is lost, false otherwise.
     */
    isLost() {
        return this._ball.topLeft.y > HEIGHT_SCENE - this._ball.dimension.width;
    };

    /**
     * Checks if the game is won (the ball hits all bricks) or not.
     * @returns {Boolean} true if the game is won, false otherwise.
     */
    isWon() {
        return this._wall.length === 0;
    };

    /**
     * Defines the ball, there is a new random position x for the ball and static
     * position y. A new random X movement and a static Y movement but always
     * up (for have always same speed).
     * If it is the first ball, defines the speed of the ball,
     * takes the old speed otherwise.
     */
    resetBall() {
        const ballPos = new Position(
            this._randomNotNull(0, WIDTH_SCENE - SIZE_BALL),
            HEIGHT_SCENE - HEIGHT_PADDLE - SIZE_BALL);
        const randomX = this._randomNotNull(-1, 1);
        const ballMov = new Movement(
            randomX * randomX, -1);

        this._ball = new Ball(
            "ball",
            ballPos,
            new Dimension(SIZE_BALL, SIZE_BALL),
            ballMov,
            (this._ball && this._wall.length !== this._defaultSizeWall)
                ? this._ball.speed : 2
        );
    };

    /**
     * Redefines the wall with the level of play on the game.
     */
    reloadWall() {
        this._wall = this._setBricksWall();
    };

    /**
     * Checks if the ball hits bricks. If it hits a brick(s) in X, the movement
     * is reversed in X, and if it hits a brick(s) in Y, the mouvement is
     * reversed in Y, otherwise the movement is unchanged.
     * @returns {Brick[]} the array with destroyed bricks
     */
    _brickCollision() {
        let array = [];
        let whereCollision = [];
        for (let i = 0; i < this._wall.length; i++) {
            const posCollision = this._wall[i].isCollider(this._ball);
            if (posCollision.length > 0) {
                whereCollision.push(posCollision);
                array.push(this._wall[i]);
                this._wall.splice(i, 1);
            };
        };

        if (whereCollision.length > 0) {
            whereCollision[0].map(element => {
                (element === "left" || element === "right") ?
                    this._ball.movement.reverseX()
                    : this._ball.movement.reverseY();
            });
            this._switchSpeed();
        };
        return array;
    };

    /**
     * Increases the speed of ball if the level is started at 25%, 50% and 75%.
     */
    _switchSpeed() {
        if (this._wall.length === Math.ceil(this._defaultSizeWall / 100 * 25)
            || this._wall.length === Math.ceil(this._defaultSizeWall / 100 * 50)
            || this._wall.length === Math.ceil(this._defaultSizeWall / 100 * 75)) {
            this._ball.addSpeed(1);
        };
    }

    /**
     * Checks if the ball hits the paddle. If it hits the paddle, the movement
     * is reversed, otherwise the movement is unchanged.
     */
    _paddleCollision() {
        if (this._paddle.isCollider(this.ball).length > 0) {
            this._ball.topLeft.y = HEIGHT_SCENE - this._paddle.dimension.height
                - this._ball.dimension.width;
            this._ball.movement.reverseY();
        };
    };

    /**
     * Generates a number between min and max included and not null.
     * @param {number} min : the given minimal number
     * @param {number} max : the given maximal number
     * @returns {number} the random number not null
     */
    _randomNotNull(min, max) {
        let random = Math.floor(Math.random() * (max - min + 1)) + min;
        while (random === 0) {
            random = this._randomNotNull(min, max);
        }
        return random;
    };

    /**
     * Sets the table of bricks for the game, taking into account
     * the constant defined in relation to the number of rows of bricks and
     * defines a new variable with the default size for wall array.
     * @returns {Brick[]} : array with all bricks on the game.
     */
    _setBricksWall() {
        let array = [];
        const level = LEVELS[this._currentLevel];
        for (let lg = 0; lg < level.length; lg++) {
            for (let col = 0; col < level[lg].length; col++) {
                if (level[lg][col] === "B") {
                    array.push(new Brick(
                        lg + "-" + col,
                        new Position(col * WIDTH_BRICK, lg * HEIGHT_BRICK + MG_BRICKS),
                        new Dimension(WIDTH_BRICK, HEIGHT_BRICK))
                    );
                };
            };
        };
        this._defaultSizeWall = array.length;
        return array;
    };
};
