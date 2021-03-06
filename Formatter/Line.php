<?php

namespace MyBuilder\Cronos\Formatter;

/**
 * Responsible for representing a line within the cron
 */
class Line
{
    /**
     * @var null|Cron
     */
    private $cron;
    /**
     * @var Comment
     */
    private $comment;
    /**
     * @var Time
     */
    private $time;
    /**
     * @var string
     */
    private $command;
    /**
     * @var Output
     */
    private $output;

    /**
     * @param string$command
     * @param null|Cron $cron
     */
    public function __construct($command, $cron = null)
    {
        $this->cron = $cron;
        $this->comment = new Comment;
        $this->time = new Time;
        $this->command = $command;
        $this->output = new Output;
    }

    /**
     * Add a comment line to be displayed before this command line
     *
     * @param string $comment
     *
     * @return $this
     */
    public function addComment($comment)
    {
        $this->comment->addComment($comment);

        return $this;
    }

    /**
     * @param string $value
     *
     * @return $this
     *
     * @see Time::setMinute
     */
    public function setMinute($value)
    {
        $this->time->setMinute($value);

        return $this;
    }

    /**
     * @param string $value
     *
     * @return $this
     *
     * @see Time::setHour
     */
    public function setHour($value)
    {
        $this->time->setHour($value);

        return $this;
    }

    /**
     * @param string $value
     *
     * @return $this
     *
     * @see Time::setDayOfMonth
     */
    public function setDayOfMonth($value)
    {
        $this->time->setDayOfMonth($value);

        return $this;
    }

    /**
     * @param string $value
     *
     * @return $this
     *
     * @see Time::setMonth
     */
    public function setMonth($value)
    {
        $this->time->setMonth($value);

        return $this;
    }

    /**
     * @param string $value
     *
     * @return $this
     *
     * @see Time::setDayOfWeek
     */
    public function setDayOfWeek($value)
    {
        $this->time->setDayOfWeek($value);

        return $this;
    }

    /**
     * Suppress the output of this command when executed
     *
     * @return $this
     *
     * @see Output::suppressOutput
     */
    public function suppressOutput()
    {
        $this->output->suppressOutput();

        return $this;
    }

    /**
     * @param string $filePath
     *
     * @return $this
     *
     * @see Output::setStandardOutFile
     */
    public function setStandardOutFile($filePath)
    {
        $this->output->setStandardOutFile($filePath);

        return $this;
    }

    /**
     * @param string $filePath
     *
     * @return $this
     *
     * @see Output::setStandardErrorFile
     */
    public function setStandardErrorFile($filePath)
    {
        $this->output->setStandardErrorFile($filePath);

        return $this;
    }

    /**
     * End this line
     *
     * @return null|Cron
     */
    public function end()
    {
        return $this->cron;
    }

    /**
     * Get the line in a format suitable for cron
     *
     * @return string
     */
    public function format()
    {
        return
            $this->comment->format() .
            $this->time->format() .
            $this->command .
            $this->output->format();
    }
}
