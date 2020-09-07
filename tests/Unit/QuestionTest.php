<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Question;
class QuestionTest extends TestCase
{
  /**
  * A basic unit test example.
  *
  * @return void
  */
  use DatabaseMigrations;

  public function testGetQuestions()
  {
    //Given we have question in the database
    $question= factory('App\Question')->create();

    //When user visit the questionzes page
    $response = $this->get('/question'); // your route to get question

    //User should be able to read the questionzes
    $response->assertSee($question->name);
  }

  public function it_can_show_the_question()
  {
    $question = factory(Question::class)->create();
    $questionRepo = new QuestionRepository(new Question);
    $found = $questionRepo->findQuestion($question->id);

    $this->assertInstanceOf(Question::class, $found);
    $this->assertEquals($found->question_text, $question->question_text);
  }

  /** @test */
  public function it_can_create_a_question()
  {
    $data = [
      'question_text' => $this->faker->word,

    ];

    $questionRepo = new QuestionRepository(new Question);
    $question = $questionRepo->createQuestion($data);

    $this->assertInstanceOf(Question::class, $question);
    $this->assertEquals($data['question_text'], $question->name);

  }

  public function findQuestion(int $id) : Question
  {
    try {
      return $this->model->findOrFail($id);
    } catch (ModelNotFoundException $e) {
      throw new QuestionNotFoundException($e);
    }
  }

  public function updateQuestion(array $data) : bool
  {
      try {
          return $this->model->update($data);
      } catch (QueryException $e) {
          throw new UpdateQuestionErrorException($e);
      }
  }
  public function deleteQuestion() : bool
  {
      return $this->model->delete();
  }

  public function question_has_an_owner(){
      $question = factory('App\Question')->create();

      $this->assertInstanceOf('App\Quiz', $question->owner);
  }
}
