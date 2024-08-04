<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JenisSoal;
use App\Models\Test;
use App\Models\Soal;

class PreTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ind = 0;
        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('blank'),
            "test" => 'listening',
            "page_title" => 'LISTENING',
            "page_subtitle" => 'COMPREHENSION',
            "title" => '-',
            "subtitle" => '-',
            "timer" => 0
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('card'),
            "test" => 'listening',
            "page_title" => 'LISTENING',
            "page_subtitle" => '-',
            "title" => 'PART A',
            "subtitle" => 'DIRECTIONS',
            "content" => "A In Part ABX, you will hear short conversations between two people. After each conversation, you will hear a question about the conversation. The conversations and questions will not be repeated. <br><br>After you hear a question, read the four possible answers and choose the best answer.",
            "timer" => 0
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('example'),
            "test" => 'listening',
            "page_title" => 'LISTENING',
            "page_subtitle" => 'EXAMPLE',
            "title" => '-',
            "subtitle" => 'You learn from the conversation that neither the man nor the woman likes the painting. The best answer to the question \u201cWhat does the man mean?\u201d is (A), \u201cHe doesn\u2019t like the painting either.\u201d Therefore, the correct choice is (A).',
            "timer" => 0,
            "no" => '0',
            "a" => 'He does not like the painting either.',
            "b" => 'He does not know how to paint.',
            "c" => 'He does not have any paintings.',
            "d" => 'He does not know what to do.',
            "key" => 'a'
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('card'),
            "test" => 'listening',
            "page_title" => 'LISTENING',
            "page_subtitle" => 'SECTION 1',
            "title" => 'PART A',
            "subtitle" => 'START',
            "content" => "-",
            "timer" => 0
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('test'),
            "test" => 'listening',
            "page_title" => 'LISTENING',
            "page_subtitle" => 'PART A',
            "title" => '-',
            "subtitle" => '-',
            "no" => "1",
            "a" => "She lost the man\u2019s calculator. ",
            "b" => "She will lend the man her calculator.",
            "c" => "The calculator may be under the man\u2019s book.",
            "d" => "The man will not have time to find the calculator.",
            "key" => "c",
            "timer" => 30,
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('test'),
            "test" => 'listening',
            "page_title" => 'LISTENING',
            "page_subtitle" => 'PART A',
            "title" => '-',
            "subtitle" => '-',
            "no" => "2",
            "a" => "Mary is not going to the concert.",
            "b" => "Mary does not know about the concert.",
            "c" => "The man should call Mary.",
            "d" => "The man should go to the concert without Mary.",
            "key" => "c",
            "timer" => 30
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('test'),
            "test" => 'listening',
            "page_title" => 'LISTENING',
            "page_subtitle" => 'PART A',
            "title" => '-',
            "subtitle" => '-',
            "no" => "3",
            "a" => "Mail the letter for the woman",
            "b" => "Purchase stamps for the woman's letter ",
            "c" => "Apply for a job at the post office",
            "d" => "Guide the woman to the post office",
            "key" => "d",
            "timer" => 30
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('test'),
            "test" => 'listening',
            "page_title" => 'LISTENING',
            "page_subtitle" => 'PART A',
            "title" => '-',
            "subtitle" => '-',
            "no" => "4",
            "a" => "He and his parents plan to visit Japan.",
            "b" => "He recently returned from Japan.",
            "c" => "His sweatshirt came from Japan.",
            "d" => "The weather can be very cold in some parts of Japan.",
            "key" => "c",
            "timer" => 30
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('test'),
            "test" => 'listening',
            "page_title" => 'LISTENING',
            "page_subtitle" => 'PART A',
            "title" => '-',
            "subtitle" => '-',
            "no" => "5",
            "a" => "He read an article about Professor Monroe's research.",
            "b" => "He does not know Professor Monroe. ",
            "c" => "Professor Monroe probably will talk to the woman.",
            "d" => "Professor Monroe does not like giving interviews",
            "key" => "c",
            "timer" => 30
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('test'),
            "test" => 'listening',
            "page_title" => 'LISTENING',
            "page_subtitle" => 'PART A',
            "title" => '-',
            "subtitle" => '-',
            "no" => "6",
            "a" => "He will help clean up after the party.",
            "b" => "He will not be able to stay late at the party.",
            "c" => "He is not going to the party.",
            "d" => "He does not think they need many tables and chairs.",
            "key" => "b",
            "timer" => 30
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('test'),
            "test" => 'listening',
            "page_title" => 'LISTENING',
            "page_subtitle" => 'PART A',
            "title" => '-',
            "subtitle" => '-',
            "no" => "7",
            "a" => "The bicycle is too big for her.",
            "b" => "She bought the bicycle at a good price.",
            "c" => "She did not know about the store on Harrison Street.",
            "d" => "She has not used her bike all summer.",
            "key" => "b",
            "timer" => 30
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('test'),
            "test" => 'listening',
            "page_title" => 'LISTENING',
            "page_subtitle" => 'PART A',
            "title" => '-',
            "subtitle" => '-',
            "no" => "8",
            "a" => "Cash her paycheck ",
            "b" => "Lend the man some money ",
            "c" => "Pay the man back money she borrowed from him",
            "d" => "Help the man look for his wallet",
            "key" => "b",
            "timer" => 30
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('test'),
            "test" => 'listening',
            "page_title" => 'LISTENING',
            "page_subtitle" => 'PART A',
            "title" => '-',
            "subtitle" => '-',
            "no" => "9",
            "a" => "He already has the CD the woman just bought.",
            "b" => "He wants to listen to the woman\u2019s CD now.",
            "c" => "He knows the woman is only joking.",
            "d" => "He is tired of listening to classical guitar music.",
            "key" => "b",
            "timer" => 30
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('test'),
            "test" => 'listening',
            "page_title" => 'LISTENING',
            "page_subtitle" => 'PART A',
            "title" => '-',
            "subtitle" => '-',
            "no" => "10",
            "a" => "He lives far from the university.",
            "b" => "He is moving next month. ",
            "c" => "He prefers living on campus. ",
            "d" => "He might be able to help the woman.",
            "key" => "d",
            "timer" => 30
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('test'),
            "test" => 'listening',
            "page_title" => 'LISTENING',
            "page_subtitle" => 'PART A',
            "title" => '-',
            "subtitle" => '-',
            "no" => "11",
            "a" => "She does not agree that it is a stressful time.",
            "b" => "She does not feel as calm as she seems.",
            "c" => "She admires the man\u2019s calmness.",
            "d" => "She will help the man to deal with his stress",
            "key" => "b",
            "timer" => 30
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('test'),
            "test" => 'listening',
            "page_title" => 'LISTENING',
            "page_subtitle" => 'PART A',
            "title" => '-',
            "subtitle" => '-',
            "no" => "12",
            "a" => "He forgot about the meeting.",
            "b" => "He will attend the meeting.",
            "c" => "He will be talking about his own project.",
            "d" => "He will help the woman with her project.",
            "key" => "b",
            "timer" => 30
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('test'),
            "test" => 'listening',
            "page_title" => 'LISTENING',
            "page_subtitle" => 'PART A',
            "title" => '-',
            "subtitle" => '-',
            "no" => "13",
            "a" => "She was also late for the meeting.",
            "b" => "She is waiting for Mark to fix her car.",
            "c" => "The meeting has not stalled yet.",
            "d" => "The bus did not arrive on time.",
            "key" => "c",
            "timer" => 30
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('test'),
            "test" => 'listening',
            "page_title" => 'LISTENING',
            "page_subtitle" => 'PART A',
            "title" => '-',
            "subtitle" => '-',
            "no" => "14",
            "a" => "Accept the job offer",
            "b" => "Discuss the job offer with a friend",
            "c" => "Apply for a job that is not so far away",
            "d" => "Keep his current job",
            "key" => "a",
            "timer" => 30
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('test'),
            "test" => 'listening',
            "page_title" => 'LISTENING',
            "page_subtitle" => 'PART A',
            "title" => '-',
            "subtitle" => '-',
            "no" => "15",
            "a" => "It is in need of repair. ",
            "b" => " It is a reconstruction.",
            "c" => "It is closed to the public.",
            "d" => "It is more than 500 years old.",
            "key" => "b",
            "timer" => 30
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('test'),
            "test" => 'listening',
            "page_title" => 'LISTENING',
            "page_subtitle" => 'PART A',
            "title" => '-',
            "subtitle" => '-',
            "no" => "16",
            "a" => "He is very' busy now.",
            "b" => "He has to check his schedule.",
            "c" => "He can meet the woman at six o\u2019clock.",
            "d" => "He prefers to meet the woman some other time.",
            "key" => "c",
            "timer" => 30
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('test'),
            "test" => 'listening',
            "page_title" => 'LISTENING',
            "page_subtitle" => 'PART A',
            "title" => '-',
            "subtitle" => '-',
            "no" => "16",
            "a" => "He is very' busy now.",
            "b" => "He has to check his schedule.",
            "c" => "He can meet the woman at six o\u2019clock.",
            "d" => "He prefers to meet the woman some other time.",
            "key" => "c",
            "timer" => 30
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('test'),
            "test" => 'listening',
            "page_title" => 'LISTENING',
            "page_subtitle" => 'PART A',
            "title" => '-',
            "subtitle" => '-',
            "no" => "17",
            "a" => "She had a difficult time finding a summer job. ",
            "b" => "She never had a summer job before.",
            "c" => "She began to enjoy her job as she gained experience.",
            "d" => "Her job became more stressful as she learned more about it.",
            "key" => "c",
            "timer" => 30
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('test'),
            "test" => 'listening',
            "page_title" => 'LISTENING',
            "page_subtitle" => 'PART A',
            "title" => '-',
            "subtitle" => '-',
            "no" => "18",
            "a" => "He already gave his presentation. ",
            "b" => "He can listen to the presentation.",
            "c" => "He is too busy to help the woman.",
            "d" => "The woman does not need to rehearse.",
            "key" => "b",
            "timer" => 30
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('test'),
            "test" => 'listening',
            "page_title" => 'LISTENING',
            "page_subtitle" => 'PART A',
            "title" => '-',
            "subtitle" => '-',
            "no" => "19",
            "a" => "Ask the man to help her figure out how to use her new computer",
            "b" => "Let the man use her computer",
            "c" => "Take her computer to a repair shop",
            "d" => "Help the man fix his computer",
            "key" => "d",
            "timer" => 30
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('test'),
            "test" => 'listening',
            "page_title" => 'LISTENING',
            "page_subtitle" => 'PART A',
            "title" => '-',
            "subtitle" => '-',
            "no" => "20",
            "a" => "She is planning to quit her job at the bookstore.",
            "b" => "She will have lunch with the man in the cafeteria.",
            "c" => "The man can save money by eating in the cafeteria.",
            "d" => "The man might be able to get a job in the cafeteria.",
            "key" => "d",
            "timer" => 30
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('test'),
            "test" => 'listening',
            "page_title" => 'LISTENING',
            "page_subtitle" => 'PART A',
            "title" => '-',
            "subtitle" => '-',
            "no" => "21",
            "a" => "She cannot enjoy them with a cold.",
            "b" => "The weather is too cold for them.",
            "c" => "They are just like the plants at home. ",
            "d" => "They make her sneeze.",
            "key" => "d",
            "timer" => 30
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('test'),
            "test" => 'listening',
            "page_title" => 'LISTENING',
            "page_subtitle" => 'PART A',
            "title" => '-',
            "subtitle" => '-',
            "no" => "22",
            "a" => "She does not know where her pen is. ",
            "b" => "The man may borrow her pen.",
            "c" => "She does not buy expensive pens. ",
            "d" => "The man has found her missing pen.",
            "key" => "d",
            "timer" => 30
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('test'),
            "test" => 'listening',
            "page_title" => 'LISTENING',
            "page_subtitle" => 'PART A',
            "title" => '-',
            "subtitle" => '-',
            "no" => "23",
            "a" => "It lost customers to another business. ",
            "b" => "It has a new owner. ",
            "c" => "It opened only recently.",
            "d" => "It stopped selling coffee.",
            "key" => "a",
            "timer" => 30
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('test'),
            "test" => 'listening',
            "page_title" => 'LISTENING',
            "page_subtitle" => 'PART A',
            "title" => '-',
            "subtitle" => '-',
            "no" => "24",
            "a" => "The Web site has not been updated. ",
            "b" => "The biology course is not offered next semester",
            "c" => "The man should take an anthropology course. ",
            "d" => "The man is looking at the wrong Web site.",
            "key" => "d",
            "timer" => 30
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('test'),
            "test" => 'listening',
            "page_title" => 'LISTENING',
            "page_subtitle" => 'PART A',
            "title" => '-',
            "subtitle" => '-',
            "no" => "25",
            "a" => "Buy a different kind of medicine",
            "b" => "See a doctor ",
            "c" => "Take a second pill",
            "d" => "Avoid taking any medication",
            "key" => "c",
            "timer" => 30
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('test'),
            "test" => 'listening',
            "page_title" => 'LISTENING',
            "page_subtitle" => 'PART A',
            "title" => '-',
            "subtitle" => '-',
            "no" => "26",
            "a" => "She recovered from a cold before the exam period started. ",
            "b" => "She is glad she has managed to stay healthy. ",
            "c" => "She is relieved she has already finished all her exams.",
            "d" => "She knows several people who are not feeling well.",
            "key" => "b",
            "timer" => 30
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('test'),
            "test" => 'listening',
            "page_title" => 'LISTENING',
            "page_subtitle" => 'PART A',
            "title" => '-',
            "subtitle" => '-',
            "no" => "27",
            "a" => "The survey results are not surprising.",
            "b" => "The survey results are not accurate.",
            "c" => "The students at his university are different from the students. in the survey.",
            "d" => "He will conduct a survey at his own university.",
            "key" => "a",
            "timer" => 30
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('test'),
            "test" => 'listening',
            "page_title" => 'LISTENING',
            "page_subtitle" => 'PART A',
            "title" => '-',
            "subtitle" => '-',
            "no" => "28",
            "a" => "There was not enough time for questions. ",
            "b" => "The lecture topic was not interesting. ",
            "c" => "The speaker was difficult to hear.",
            "d" => "The audience\u2019s questions were not interesting.",
            "key" => "d",
            "timer" => 30
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('test'),
            "test" => 'listening',
            "page_title" => 'LISTENING',
            "page_subtitle" => 'PART A',
            "title" => '-',
            "subtitle" => '-',
            "no" => "29",
            "a" => "Get a ride to the station with the woman ",
            "b" => "Take the woman to the station",
            "c" => "Borrow the woman's car to go to the station ",
            "d" => "Drive his car instead of taking the train",
            "key" => "a",
            "timer" => 30
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('test'),
            "test" => 'listening',
            "page_title" => 'LISTENING',
            "page_subtitle" => 'PART A',
            "title" => '-',
            "subtitle" => '-',
            "no" => "30",
            "a" => "The woman went to the concert.",
            "b" => "The man performed in a concert last Friday.",
            "c" => "The concert was sold out.",
            "d" => "The concert was canceled.",
            "key" => "d",
            "timer" => 30
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('card'),
            "test" => 'listening',
            "page_title" => 'LISTENING',
            "page_subtitle" => '-',
            "title" => 'PART A',
            "subtitle" => 'DIRECTIONS',
            "content" => "A In Part ABX, you will hear short conversations between two people. After each conversation, you will hear a question about the conversation. The conversations and questions will not be repeated. <br><br>After you hear a question, read the four possible answers and choose the best answer.",
            "timer" => 60
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('card'),
            "test" => 'listening',
            "page_title" => 'LISTENING',
            "page_subtitle" => '-',
            "title" => 'PART A',
            "subtitle" => 'THE END',
            "content" => "-",
            "timer" => 0
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('card'),
            "test" => 'listening',
            "page_title" => 'LISTENING',
            "page_subtitle" => '-',
            "title" => 'PART B',
            "subtitle" => 'DIRECTIONS',
            "content" => "In this part of the test, you will hear longer conversations. After each conversation, you will hear several questions. The conversations and questions will not be repeated. <br><br> After you hear a question, read the four possible answers in your book and choose the best answer.",
            "timer" => 0
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('card'),
            "test" => 'listening',
            "page_title" => 'LISTENING',
            "page_subtitle" => '-',
            "title" => 'PART B',
            "subtitle" => 'START',
            "content" => "-",
            "timer" => 0
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('question'),
            "test" => 'listening',
            "page_title" => 'LISTENING',
            "page_subtitle" => 'PART B',
            "title" => 'QUESTION 31 - 34',
            "subtitle" => '-',
            "timer" => 0
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('test'),
            "test" => 'listening',
            "page_title" => 'LISTENING',
            "page_subtitle" => 'PART B',
            "title" => '-',
            "subtitle" => '-',
            "no" => "31",
            "a" => "A swimming competition ",
            "b" => "A singing contest",
            "c" => "The water temperature at the beach",
            "d" => "The woman\u2019s schedule this semester",
            "key" => "b",
            "timer" => 30
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('test'),
            "test" => 'listening',
            "page_title" => 'LISTENING',
            "page_subtitle" => 'PART B',
            "title" => '-',
            "subtitle" => '-',
            "no" => "32",
            "a" => "They have won for the past three years.",
            "b" => "They placed second last year.",
            "c" => "They practiced for three months prior to the competition.",
            "d" => "She thought they did not perform well.",
            "key" => "a",
            "timer" => 30
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('test'),
            "test" => 'listening',
            "page_title" => 'LISTENING',
            "page_subtitle" => 'PART B',
            "title" => '-',
            "subtitle" => '-',
            "no" => "33",
            "a" => "Studying in the library",
            "b" => "Practicing his singing",
            "c" => "Walking on the beach",
            "d" => "Swimming in the ocean",
            "key" => "a",
            "timer" => "30",
            "timer" => 30
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('test'),
            "test" => 'listening',
            "page_title" => 'LISTENING',
            "page_subtitle" => 'PART B',
            "title" => '-',
            "subtitle" => '-',
            "no" => "34",
            "a" => "She spent many hours on a bus.",
            "b" => "She was too busy to enjoy the beach.",
            "c" => "She had plenty of time to study. ",
            "d" => "She did not have time to watch the competition.",
            "key" => "b",
            "timer" => 30
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('question'),
            "test" => 'listening',
            "page_title" => 'LISTENING',
            "page_subtitle" => 'PART B',
            "title" => 'QUESTION 35 - 37',
            "subtitle" => '-',
            "timer" => 0
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('test'),
            "test" => 'listening',
            "page_title" => 'LISTENING',
            "page_subtitle" => 'PART B',
            "title" => '-',
            "subtitle" => '-',
            "no" => "35",
            "a" => "The first Japanese artist to start an art school in the United States",
            "b" => "Two artists\u2019 efforts to promote Japanese art in Europe",
            "c" => "One artist\u2019s straggle to overcome financial difficulties",
            "d" => "Influences on one artist\u2019s work",
            "key" => "d",
            "timer" => 30
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('test'),
            "test" => 'listening',
            "page_title" => 'LISTENING',
            "page_subtitle" => 'PART B',
            "title" => '-',
            "subtitle" => '-',
            "no" => "36",
            "a" => "He wrote poetry.",
            "b" => "He built houses.",
            "c" => "He designed gardens.",
            "d" => "He created modem sculptures.",
            "key" => "a",
            "timer" => 30
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('test'),
            "test" => 'listening',
            "page_title" => 'LISTENING',
            "page_subtitle" => 'PART B',
            "title" => '-',
            "subtitle" => '-',
            "no" => "37",
            "a" => "Draw the human figure",
            "b" => "See similarities between poetry and visual art",
            "c" => "Appreciate and work with natural materials",
            "d" => "Use money wisely",
            "key" => "c",
            "timer" => 30
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('card'),
            "test" => 'listening',
            "page_title" => 'LISTENING',
            "page_subtitle" => 'COMPREHENSION',
            "title" => 'PART B',
            "subtitle" => 'THE END',
            "content" => "-",
            "timer" => 0
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('card'),
            "test" => 'listening',
            "page_title" => 'LISTENING',
            "page_subtitle" => 'COMPREHENSION',
            "title" => 'PART B',
            "subtitle" => 'DIRECTIONS',
            "content" => "In this part of the test, you will hear several short talks. After each talk, you will hear some questions. The talks and questions will not be repeated. <br><br> After you hear a question, read the four possible answers in your book and choose the best answer.",
            "timer" => 0
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('example'),
            "test" => 'listening',
            "page_title" => 'LISTENING',
            "page_subtitle" => 'EXAMPLE',
            "title" => '-',
            "subtitle" => 'The best answer to the question, \u201cWhat is the main purpose of the program?\u201d is (C), \u201dTo explain the workings of the brain.\u201d Therefore, the correct answer is (C).',
            "no" => "0",
            "a" => "To demonstrate the latest use of computer graphics",
            "b" => "To discuss the possibility of an economic depression",
            "c" => "To explain the workings of the brain",
            "d" => "To dramatize a famous mystery story",
            "key" => "c",
            "timer" => 0
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('example'),
            "test" => 'listening',
            "page_title" => 'LISTENING',
            "page_subtitle" => 'EXAMPLE',
            "title" => '-',
            "subtitle" => "The best answer to the question \u201cWhy does the speaker recommend watching the program?\u201d is (D), \u201cIt will help with course work.\u201d Therefore, the correct choice is (D).",
            "no" => "0",
            "a" => "It is required of all science majors.",
            "b" => "It will never be shown again.",
            "c" => "It can help viewers improve their memory skills.",
            "d" => "It will help with course work.",
            "key" => "d",
            "timer" => 0
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('card'),
            "test" => 'listening',
            "page_title" => 'LISTENING',
            "page_subtitle" => 'COMPREHENSION',
            "title" => 'PART C',
            "subtitle" => 'START',
            "content" => "-",
            "timer" => 0
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('question'),
            "test" => 'listening',
            "page_title" => 'LISTENING',
            "page_subtitle" => 'PART C',
            "title" => 'QUESTION 38 - 41',
            "subtitle" => '-',
            "timer" => 0
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('test'),
            "test" => 'listening',
            "page_title" => 'LISTENING',
            "page_subtitle" => 'PART C',
            "title" => '-',
            "subtitle" => '-',
            "no" => "38",
            "a" => "Differences between longitudinal studies and cross-sectional studies",
            "b" => "Advantages of cohort studies over other research approaches",
            "c" => "Differences between child psychology and adult psychology",
            "d" => "Recent improvements in research methodologies",
            "key" => "a",
            "timer" => 30
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('test'),
            "test" => 'listening',
            "page_title" => 'LISTENING',
            "page_subtitle" => 'PART C',
            "title" => '-',
            "subtitle" => '-',
            "no" => "39",
            "a" => "Whether shyness is a learned behavior",
            "b" => "Whether shyness can affect children\u2019s learning",
            "c" => "Whether many different factors contribute to shyness",
            "d" => "Whether shyness in children is related to age",
            "key" => "d",
            "timer" => 30
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('test'),
            "test" => 'listening',
            "page_title" => 'LISTENING',
            "page_subtitle" => 'PART C',
            "title" => '-',
            "subtitle" => '-',
            "no" => "40",
            "a" => "Their results are difficult to analyze.",
            "b" => "They can be used only in studies of young children.",
            "c" => "Participants may not be available for the entire study.",
            "d" => "Researchers do not consider the results of such studies reliable.",
            "key" => "c",
            "timer" => 30
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('test'),
            "test" => 'listening',
            "page_title" => 'LISTENING',
            "page_subtitle" => 'PART C',
            "title" => '-',
            "subtitle" => '-',
            "no" => "41",
            "a" => "By observing one group of children as they grow",
            "b" => "By observing groups of different-aged children at one point in time",
            "c" => "By comparing children's behavior at home to their behavior at school",
            "d" => "By comparing children's behavior to their parents\u2019 behavior",
            "key" => "b",
            "timer" => 30
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('question'),
            "test" => 'listening',
            "page_title" => 'LISTENING',
            "page_subtitle" => 'PART C',
            "title" => 'QUESTION 42 - 46',
            "subtitle" => '-',
            "timer" => 0
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('test'),
            "test" => 'listening',
            "page_title" => 'LISTENING',
            "page_subtitle" => 'PART C',
            "title" => '-',
            "subtitle" => '-',
            "no" => "42",
            "a" => "Ways in which human activities affect aquifers",
            "b" => "The formation of Earth's gravitational field",
            "c" => "The impact of Earth\u2019s gravitational anomalies on satellites",
            "d" => "Variations in Earth\u2019s gravitational field",
            "key" => "d",
            "timer" => 30
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('test'),
            "test" => 'listening',
            "page_title" => 'LISTENING',
            "page_subtitle" => 'PART C',
            "title" => '-',
            "subtitle" => '-',
            "no" => "43",
            "a" => "They were recently replaced.",
            "b" => "They are extremely precise.",
            "c" => "Their settings are changed seasonally.",
            "d" => "Their data are used to make new maps on a daily basis.",
            "key" => "b",
            "timer" => 30
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('test'),
            "test" => 'listening',
            "page_title" => 'LISTENING',
            "page_subtitle" => 'PART C',
            "title" => '-',
            "subtitle" => '-',
            "no" => "44",
            "a" => "At sea level",
            "b" => "At the equator",
            "c" => "On mountaintops",
            "d" => "Over aquifers",
            "key" => "c",
            "timer" => 30
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('test'),
            "test" => 'listening',
            "page_title" => 'LISTENING',
            "page_subtitle" => 'PART C',
            "title" => '-',
            "subtitle" => '-',
            "no" => "45",
            "a" => "Water levels in aquifers there are declining.",
            "b" => "The region has more aquifers than previously thought.",
            "c" => "Water-conservation efforts there are effective.",
            "d" => "The region used to be covered by glaciers.",
            "key" => "a",
            "timer" => 30
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('test'),
            "test" => 'listening',
            "page_title" => 'LISTENING',
            "page_subtitle" => 'PART C',
            "title" => '-',
            "subtitle" => '-',
            "no" => "46",
            "a" => "It is already intensifying droughts in California.",
            "b" => "Its effects are more significant in areas with stronger gravity.",
            "c" => "It can cause measurable changes in gravity in certain areas.",
            "d" => "Its impact on sea levels has not been measured.",
            "key" => "c",
            "timer" => 30
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('question'),
            "test" => 'listening',
            "page_title" => 'LISTENING',
            "page_subtitle" => 'PART C',
            "title" => 'QUESTION 47 - 50',
            "subtitle" => '-',
            "timer" => 0
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('test'),
            "test" => 'listening',
            "page_title" => 'LISTENING',
            "page_subtitle" => 'PART C',
            "title" => '-',
            "subtitle" => '-',
            "no" => "47",
            "a" => "How people in rural areas preserved food",
            "b" => "The construction of icehouses",
            "c" => "An important industry in the nineteenth century",
            "d" => "How improvements in transportation affected industry",
            "key" => "c",
            "timer" => 30
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('test'),
            "test" => 'listening',
            "page_title" => 'LISTENING',
            "page_subtitle" => 'PART C',
            "title" => '-',
            "subtitle" => '-',
            "no" => "48",
            "a" => "Only wealthy families had them.",
            "b" => "They were important to the ice industry.",
            "c" => "They were built mostly on the east coast.",
            "d" => "They are no longer in common use.",
            "key" => "d",
            "timer" => 30
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('test'),
            "test" => 'listening',
            "page_title" => 'LISTENING',
            "page_subtitle" => 'PART C',
            "title" => '-',
            "subtitle" => '-',
            "no" => "49",
            "a" => "Modern technology for the kitchen",
            "b" => "Improved transportation systems",
            "c" => "Industrial use of streams and rivers",
            "d" => "Increased temperatures in many areas",
            "key" => "a",
            "timer" => 30
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('test'),
            "test" => 'listening',
            "page_title" => 'LISTENING',
            "page_subtitle" => 'PART C',
            "title" => '-',
            "subtitle" => '-',
            "no" => "50",
            "a" => "To keep train engines cool",
            "b" => "To preserve perishable food",
            "c" => "To store ice while it was being transported",
            "d" => "To lift blocks of ice from frozen lakes and ponds",
            "key" => "b",
            "timer" => 30
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('blank'),
            "test" => 'listening',
            "page_title" => 'LISTENING',
            "page_subtitle" => 'THE END',
            "title" => '-',
            "subtitle" => '-',
            "timer" => 0
        ]);
    }

    protected function get_jenis_soal($soal)
    {
        $jenis_soal = JenisSoal::select('id', 'type_soal')
            ->where('type_soal', $soal)
            ->first();
        return $jenis_soal->id;
    }

    protected function get_jenis_test($test)
    {
        $jenis_test = Test::select('id', 'jenis_test')
            ->where('jenis_test', $test)
            ->first();
        return $jenis_test->id;
    }
}
