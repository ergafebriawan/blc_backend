<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JenisSoal;
use App\Models\Test;
use App\Models\Soal;

class SoalSeeder extends Seeder
{

    public function run()
    {
        //blank
        Soal::create([
            "index" => 1,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('blank'),
            "test" => 'listening',
            "page_title" => 'LISTENING',
            "page_subtitle" => 'COMPREHENSION',
            "title" => 'LISTENING',
            "subtitle" => 'COMPREHENSION',
            "timer" => 0
        ]);

        //card
        Soal::create([
            "index" => 2,
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

        //example
        Soal::create([
            "index" => 3,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('example'),
            "test" => 'listening',
            "page_title" => 'LISTENING',
            "page_subtitle" => 'EXAMPLE',
            "title" => '-',
            "subtitle" => 'You learn from the conversation that neither the man nor the woman likes the painting. The best answer to the question \u201cWhat does the man mean?\u201d is (A), \u201cHe doesn\u2019t like the painting either.\u201d Therefore, the correct choice is (A).',
            "timer" => 60,
            "no" => '0',
            "a" => 'He does not like the painting either.',
            "b" => 'He does not know how to paint.',
            "c" => 'He does not have any paintings.',
            "d" => 'He does not know what to do.',
            "key" => 'a'
        ]);

        //test
        Soal::create([
            "index" => 4,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('test'),
            "test" => 'listening',
            "page_title" => 'LISTENING',
            "page_subtitle" => 'PART A',
            "title" => '-',
            "subtitle" => '-',
            "timer" => 30,
            "no" => "1",
            "a" => "She lost the man\u2019s calculator. edit",
            "b" => "She will lend the man her calculator.",
            "c" => "The calculator may be under the man\u2019s book.",
            "d" => "The man will not have time to find the calculator.",
            "key" => "c"
        ]);

        Soal::create([
            "index" => 5,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('test'),
            "test" => 'listening',
            "page_title" => 'LISTENING',
            "page_subtitle" => 'PART A',
            "title" => '-',
            "subtitle" => '-',
            "timer" => 30,
            "no" => "2",
            "a" => "He lost the man\u2019s calculator. edit",
            "b" => "He will lend the man her calculator.",
            "c" => "The calculator may be under the man\u2019s book.",
            "d" => "The man will not have time to find the calculator.",
            "key" => "d"
        ]);

        //test1
        Soal::create([
            "index" => 6,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('test1'),
            "test" => 'structure',
            "page_title" => 'WRITTEN',
            "page_subtitle" => 'EXAMPLE',
            "title" => "Guppies are sometimes calls rainbow fish because of the males bright colors.",
            "subtitle" => "The sentence should read, \"Guppies are sometimes called rainbow fish because of the males bright colors.\" Therefore, you should choose (A).",
            "timer" => 60,
            "no" => "0",
            "a" => "calls",
            "b" => "fish",
            "c" => "because of",
            "d" => "bright",
            "key" => "a"
        ]);

        Soal::create([
            "index" => 7,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('test1'),
            "test" => 'structure',
            "page_title" => 'WRITTEN',
            "page_subtitle" => 'PART B',
            "title" => "Guppies are sometimes calls rainbow fish because of the males bright colors.",
            "subtitle" => "The sentence should read, \"Guppies are sometimes called rainbow fish because of the males bright colors.\" Therefore, you should choose (A).",
            "timer" => 30,
            "no" => "1",
            "a" => "calls",
            "b" => "fish",
            "c" => "because of",
            "d" => "bright",
            "key" => "b"
        ]);

        //question
        Soal::create([
            "index" => 8,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('question'),
            "test" => 'listening',
            "page_title" => 'LISTENING',
            "page_subtitle" => 'PART B',
            "title" => 'QUESTION 31 - 34',
            "subtitle" => '-',
            "timer" => 60
        ]);

        //paragraph
        Soal::create([
            "index" => 9,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('paragraph'),
            "test" => 'reading',
            "page_title" => 'READING',
            "page_subtitle" => 'COMPREHENSION',
            "title" => "The phrase \u201cthis trend\u201d in line 14 refers to",
            "subtitle" => "-",
            "timer" => 30,
            "paragraph_title" => "Questions 1-10",
            "paragraph" => "A In Part ABX, you will hear short conversations between two people. After each conversation, you will hear a question about the conversation. The conversations and questions will not be repeated. <br><br>After you hear a question, read the four possible answers and choose the best answer. A In Part ABX, you will hear short conversations between two people. After each conversation, you will hear a question about the conversation. The conversations and questions will not be repeated. <br><br>After you hear a question, read the four possible answers and choose the best answer. A In Part ABX, you will hear short conversations between two people. After each conversation, you will hear a question about the conversation. The conversations and questions will not be repeated. <br><br>After you hear a question, read the four possible answers and choose the best answer.",
            "no" => "7",
            "a" => "Industrial workers becoming farmers",
            "b" => "The economic development of the countryside",
            "c" => "The loss of rural population",
            "d" => "Innovations in manufacturing",
            "key" => "c"
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
