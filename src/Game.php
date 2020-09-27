<?php

namespace App;

class Game
{

    const FRAMES_PER_GAME = 10;

    protected array $rolls = [];

    public function roll(int $pins)
    {
        $this->rolls[] = $pins;
    }

    public function score()
    {
        $score = 0;
        $roll  = 0;

        foreach (range(1, self::FRAMES_PER_GAME) as $frame) {
            //check for strike
            if ($this->isStrike($roll)) {
                $score += $this->pinCount($roll) + $this->strikeBonus($roll);

                $roll += 1;

                continue;
            }

            $score += $this->defaultFrameScore($roll);

            //check for a spare
            if ($this->isSpare($roll)) {

                $score += $this->spareBonus($roll);
                continue;
            }

            $roll += 2;

        }

        return $score;
    }

    /**
     * @param int $roll
     *
     * @return bool
     */
    protected function isStrike(int $roll): bool
    {
        return $this->pinCount($roll) === 10;
    }

    /**
     * @param int $roll
     *
     * @return bool
     */
    protected function isSpare(int $roll): bool
    {
        return $this->defaultFrameScore($roll) === 10;
    }

    /**
     * @param int $roll
     *
     * @return mixed
     */
    protected function defaultFrameScore(int $roll): int
    {
        return $this->pinCount($roll) + $this->pinCount($roll + 1);
    }

    /**
     * @param int $roll
     *
     * @return mixed
     */
    protected function strikeBonus(int $roll): int
    {
        return $this->pinCount($roll + 1) + $this->pinCount($roll + 2);
    }

    /**
     * @param int $roll
     *
     * @return mixed
     */
    protected function spareBonus(int $roll): int
    {
        return $this->pinCount($roll + 2);

    }

    protected function pinCount(int $roll): int
    {
        return $this->rolls[$roll];
    }
}