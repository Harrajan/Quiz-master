<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class QuizTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
     use DatabaseMigrations;

     public function testGetQuizzes()
     {
         //Given we have quiz in the database
         $quiz= factory('App\Quiz')->create();

         //When user visit the quizzes page
         $response = $this->get('/quiz'); // your route to get quiz

         //User should be able to read the quizzes
         $response->assertSee($quiz->name);
     }
}
