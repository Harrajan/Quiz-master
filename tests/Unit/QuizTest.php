<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Quiz;
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

  public function it_can_show_the_quiz()
  {
    $quiz = factory(Quiz::class)->create();
    $quizRepo = new QuizRepository(new Quiz);
    $found = $quizRepo->findQuiz($quiz->id);

    $this->assertInstanceOf(Quiz::class, $found);
    $this->assertEquals($found->name, $quiz->name);
    $this->assertEquals($found->description, $quiz->description);
    $this->assertEquals($found->user_id, $quiz->user_id);
  }

  /** @test */
  public function it_can_create_a_quiz()
  {
    $data = [
      'name' => $this->faker->word,
      'description' => $this->faker->text,
      'user_id' => $this->faker->int,
    ];

    $quizRepo = new QuizRepository(new Quiz);
    $quiz = $quizRepo->createQuiz($data);

    $this->assertInstanceOf(Quiz::class, $quiz);
    $this->assertEquals($data['name'], $quiz->name);
    $this->assertEquals($data['description'], $quiz->description);
    $this->assertEquals($data['user_id'], $quiz->user_id);
  }

  public function findQuiz(int $id) : Quiz
  {
    try {
      return $this->model->findOrFail($id);
    } catch (ModelNotFoundException $e) {
      throw new QuizNotFoundException($e);
    }
  }

  public function updateQuiz(array $data) : bool
  {
      try {
          return $this->model->update($data);
      } catch (QueryException $e) {
          throw new UpdateQuizErrorException($e);
      }
  }
  public function deleteQuiz() : bool
  {
      return $this->model->delete();
  }

  public function quiz_has_an_owner(){
      $quiz = factory('App\Quiz')->create();

      $this->assertInstanceOf('App\User', $quiz->owner);
  }
}
