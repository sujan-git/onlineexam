<?php

namespace App\Http\Views\Composers;


use Illuminate\View\View;
use App\Model\Subject;

class SubjectComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $subject;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct(Subject $subject)
    {
        // Dependencies automatically resolved by service container...
        $this->subject = $subject;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('subjects', $this->subject->get());
    }
}