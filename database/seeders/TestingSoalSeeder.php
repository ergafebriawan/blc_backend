<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JenisSoal;
use App\Models\Test;
use App\Models\Soal;

class TestingSoalSeeder extends Seeder
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
            "subtitle" => '-'
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
            "content" => "A In Part ABX, you will hear short conversations between two people. After each conversation, you will hear a question about the conversation. The conversations and questions will not be repeated. <br><br>After you hear a question, read the four possible answers and choose the best answer."
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
            "content" => "-"
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
            "type_soal" => $this->get_jenis_soal('card'),
            "test" => 'listening',
            "page_title" => 'LISTENING',
            "page_subtitle" => '-',
            "title" => 'PART A',
            "subtitle" => 'THE END',
            "content" => "-"
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
            "content" => "In this part of the test, you will hear longer conversations. After each conversation, you will hear several questions. The conversations and questions will not be repeated. <br><br> After you hear a question, read the four possible answers in your book and choose the best answer."
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
            "content" => "-"
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('question'),
            "test" => 'listening',
            "page_title" => 'LISTENING',
            "page_subtitle" => 'PART B',
            "title" => 'QUESTION 31 - 34',
            "subtitle" => '-'
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
            "type_soal" => $this->get_jenis_soal('card'),
            "test" => 'listening',
            "page_title" => 'LISTENING',
            "page_subtitle" => 'COMPREHENSION',
            "title" => 'PART B',
            "subtitle" => 'THE END',
            "content" => "-"
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
            "content" => "In this part of the test, you will hear several short talks. After each talk, you will hear some questions. The talks and questions will not be repeated. <br><br> After you hear a question, read the four possible answers in your book and choose the best answer."
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
            "key" => "c"
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
            "key" => "d"
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
            "content" => "-"
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('question'),
            "test" => 'listening',
            "page_title" => 'LISTENING',
            "page_subtitle" => 'PART C',
            "title" => 'QUESTION 38 - 41',
            "subtitle" => '-'
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
            "type_soal" => $this->get_jenis_soal('blank'),
            "test" => 'listening',
            "page_title" => 'LISTENING',
            "page_subtitle" => 'THE END',
            "title" => '-',
            "subtitle" => '-'
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('blank'),
            "test" => 'structure',
            "page_title" => 'STRUCTURE',
            "page_subtitle" => 'DIRECTIONS',
            "title" => 'Questions 1\u201315 are incomplete sentences. Beneath each sentence you will see 4 possible answers. Choose 1 answer that best completes the sentence.',
            "subtitle" => '-',
            "timer" => 60
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('example'),
            "test" => 'structure',
            "page_title" => 'STRUCTURE',
            "page_subtitle" => 'EXAMPLE',
            "title" => 'Geysers have often been compared to volcanoes .......... they both emit hot liquids from below the Earth\u2019s surface.',
            "subtitle" => "The sentence should read, \"Geysers have often been compared to volcanoes because they both emit hot liquids from beneath the Earth's surface.\" Therefore, the correct choice is (B).",
            "no" => "0",
            "a" => "Due to",
            "b" => "Because",
            "c" => "In spite of",
            "d" => "Regardless of",
            "key" => "b",
            "timer" => 60
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('example'),
            "test" => 'structure',
            "page_title" => 'STRUCTURE',
            "page_subtitle" => 'EXAMPLE',
            "title" => 'During the early period of ocean navigation, .......... any need for sophisticated instruments and techniques.',
            "subtitle" => "The sentence should read, \"During the earlier period of ocean navigation, there was hardly any need for sophisticated instruments and techniques.\" Therefore, the correct answer is (D).",
            "no" => "0",
            "a" => "So that hardly",
            "b" => "When there hardly was",
            "c" => "Hardly was",
            "d" => "There was hardly",
            "key" => "d",
            "timer" => 60
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('card'),
            "test" => 'structure',
            "page_title" => 'STRUCTURE',
            "page_subtitle" => '-',
            "title" => 'START',
            "subtitle" => 'Now begin work on the questions',
            "content" => "-"
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('test'),
            "test" => 'structure',
            "page_title" => 'STRUCTURE',
            "page_subtitle" => '',
            "title" => '.......... of classical ballet in the United States began around 1830.',
            "subtitle" => '-',
            "no" => "1",
            "a" => "To teach",
            "b" => "Is teaching",
            "c" => "It was taught ",
            "d" => "The teaching",
            "key" => "d",
            "timer" => 30
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('test'),
            "test" => 'structure',
            "page_title" => 'STRUCTURE',
            "page_subtitle" => '',
            "title" => "The gardenia, about 200 species .......... to tropical and subtropical countries, was named in honor of eighteenth-century naturalist Alexander Garden. ",
            "a" => "Native of which are ",
            "b" => "Are native of which ",
            "c" => "Which are native of ",
            "d" => "Of which are native",
            "key" => "d",
            "timer" => "30",
            "no" => "2",
            "subtitle" => '-'
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('test'),
            "test" => 'structure',
            "page_title" => 'STRUCTURE',
            "page_subtitle" => '',
            "title" => "One researcher observed .......... after two months in the wild some game-farm turkeys still allowed humans to approach within six feet before showing alarm. ",
            "a" => "By",
            "b" => "There were",
            "c" => "Which",
            "d" => "That",
            "key" => "d",
            "timer" => "30",
            "no" => "3",
            "subtitle" => '-'
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('test'),
            "test" => 'structure',
            "page_title" => 'STRUCTURE',
            "page_subtitle" => '',
            "title" => "Comparative anatomy is .......... classification of both plants and animals.",
            "a" => "The basis for ",
            "b" => "For basics ",
            "c" => "The basis that ",
            "d" => "The basically",
            "key" => "a",
            "timer" => "30",
            "no" => "4",
            "subtitle" => '-'
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('test'),
            "test" => 'structure',
            "page_title" => 'STRUCTURE',
            "page_subtitle" => '',
            "title" => "In their designs the Shakers always sought .......... to a problem, whether it was a rocking chair or a steam engine. ",
            "a" => "The simplest solution ",
            "b" => "The solution of simplest",
            "c" => "The solution that simplification",
            "d" => "Which solution simplest",
            "key" => "a",
            "timer" => "30",
            "no" => "5",
            "subtitle" => '-'
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('test'),
            "test" => 'structure',
            "page_title" => 'STRUCTURE',
            "page_subtitle" => '',
            "title" => "Once information has been attended to and recognized as meaningful or relevant, .......... to short-term memory.",
            "a" => "To transfer it",
            "b" => "When it is transferred",
            "c" => "Its transfer",
            "d" => "It is transferred",
            "key" => "d",
            "timer" => "30",
            "no" => "6",
            "subtitle" => '-'
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('test'),
            "test" => 'structure',
            "page_title" => 'STRUCTURE',
            "page_subtitle" => '',
            "title" => "Clouds .......... in warm air rises, cools, and condenses.",
            "a" => "When form water vapor",
            "b" => "Form when water vapor",
            "c" => "Form vapor water when",
            "d" => "Vapor form when water",
            "key" => "b",
            "timer" => "30",
            "no" => "7",
            "subtitle" => '-'
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('test'),
            "test" => 'structure',
            "page_title" => 'STRUCTURE',
            "page_subtitle" => '',
            "title" => "Geometrically, the hyperbolic functions are related to the hyperbola, .......... the trigonometric functions are related to the circle.",
            "a" => "Just as",
            "b" => "Same",
            "c" => "Similar to",
            "d" => "And similar",
            "key" => "a",
            "timer" => "30",
            "no" => "8",
            "subtitle" => '-'
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('test'),
            "test" => 'structure',
            "page_title" => 'STRUCTURE',
            "page_subtitle" => '',
            "title" => "High altitude is a high-stress environment, and the plants there have fewer stems and leaves than .......... at lower altitudes.",
            "a" => "Have found",
            "b" => "Those found",
            "c" => "That they find",
            "d" => "Finding",
            "key" => "b",
            "timer" => "30",
            "no" => "9",
            "subtitle" => '-'
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('test'),
            "test" => 'structure',
            "page_title" => 'STRUCTURE',
            "page_subtitle" => '',
            "title" => "The 1903 film The Great Train Robbery was the first significant film in which the classic western story\u2019s .......... formula of crime and retribution",
            "a" => "Was used",
            "b" => "To be used",
            "c" => "Used",
            "d" => "Had used",
            "key" => "a",
            "timer" => "30",
            "no" => "10",
            "subtitle" => '-'
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('blank'),
            "test" => 'structure',
            "page_title" => 'STRUCTURE',
            "page_subtitle" => 'THE END',
            "title" => '-',
            "subtitle" => '-'
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('card'),
            "test" => 'reading',
            "page_title" => 'READING',
            "page_subtitle" => 'DIRECTIONS',
            "title" => '-',
            "subtitle" => '-',
            "content" => "In this section you will read several passages. Each passage is followed by several questions about it. For questions 1-50, you are to choose the one best answer, (A), (B), (C) or (D), to each question. <br><br> Answer all questions following a passage on the basis of what is stated or implied in the passage."
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('paragraph'),
            "test" => 'reading',
            "page_title" => 'READING',
            "page_subtitle" => 'EXAMPLE',
            "title" => "What is the main idea of the passage?",
            "subtitle" => "The main idea of the passage is that societies need to agree about how time is to be measured in order to function smoothly. Therefore, you should choose (C).",
            "paragraph_title" => "Read the following sample passage=>",
            "paragraph" => "     In the later part of the nineteenth century, the direction of expansion in the 
United States shifted from the countryside to the city. During the crises of the 1870s 
and the 1890s, tens of thousands of families abandoned their farms and ranches and 
headed for urban areas. Even prosperity produced migration from the countryside to 
the city. As pioneers settled rural districts, eventually the number of farms or ranches 
approached the maximum number the land would support. Landowners sought to 
increase their productivity through mechanization, and those who were successful 
invested their returns in the purchase of additional land and equipment, expanding their 
holdings by buying the farms of less fortunate neighbors, who moved on. Compare this 
pattern of economic development with that of the city, where innovations in 
manufacturing led to the creation of new opportunities and new jobs. But in the 
countryside, economic development inevitably meant depopulation. Rural areas in the 
central part of the country had begun to lose population by the 1880s, and over the next 
half century most of the rural West was overtaken by this trend. For every industrial 
worker who became a farmer, 20 young men from farms rushed to the city to compete 
for his job. 
     Less well-known is the fact that for every 20 young farm men, as many as 25 or 
30 young farm women moved from the rural West to the cities. As a government report 
noted in 1920, young farm women were more likely to leave the farm and move to a 
western city than were young farm men. This amounted to a stunning reversal of the 
traditional pattern of western urban settlement, which featured the presence of many 
young, unattached men among the migrants but almost no single women. 
     What explains the greater rates of female migration to the cities? In the opinion of 
many contemporaries, young women were pushed out of the countryside by constricted 
opportunities, particularly limited educational and vocational options.",
            "a" => "In modern society, we must take more time for our neighbors.",
            "b" => "The traditions of society are timeless.",
            "c" => "An accepted way of measuring time is essential for the smooth functioningof society.",
            "d" => "Society judges people by the times at which they conduct certain activities.",
            "key" => "c",
            "no" => "0"
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('paragraph'),
            "test" => 'reading',
            "page_title" => 'READING',
            "page_subtitle" => 'EXAMPLE',
            "title" => "In line 5, the phrase \u201cthis tradition\u201d refers to",
            "subtitle" => "The phrase \u201cthis tradition\u201d refers to the preceding clause, \u201cpeople have been in rough agreement with their neighbors as to the time of day.\u201d Therefore, you should choose (D).",
            "paragraph_title" => "Read the following sample passage=>",
            "paragraph" => "     In the later part of the nineteenth century, the direction of expansion in the 
United States shifted from the countryside to the city. During the crises of the 1870s 
and the 1890s, tens of thousands of families abandoned their farms and ranches and 
headed for urban areas. Even prosperity produced migration from the countryside to 
the city. As pioneers settled rural districts, eventually the number of farms or ranches 
approached the maximum number the land would support. Landowners sought to 
increase their productivity through mechanization, and those who were successful 
invested their returns in the purchase of additional land and equipment, expanding their 
holdings by buying the farms of less fortunate neighbors, who moved on. Compare this 
pattern of economic development with that of the city, where innovations in 
manufacturing led to the creation of new opportunities and new jobs. But in the 
countryside, economic development inevitably meant depopulation. Rural areas in the 
central part of the country had begun to lose population by the 1880s, and over the next 
half century most of the rural West was overtaken by this trend. For every industrial 
worker who became a farmer, 20 young men from farms rushed to the city to compete 
for his job. 
     Less well-known is the fact that for every 20 young farm men, as many as 25 or 
30 young farm women moved from the rural West to the cities. As a government report 
noted in 1920, young farm women were more likely to leave the farm and move to a 
western city than were young farm men. This amounted to a stunning reversal of the 
traditional pattern of western urban settlement, which featured the presence of many 
young, unattached men among the migrants but almost no single women. 
     What explains the greater rates of female migration to the cities? In the opinion of 
many contemporaries, young women were pushed out of the countryside by constricted 
opportunities, particularly limited educational and vocational options.",
            "a" => "The practice of starting the business day at dawn",
            "b" => "Friendly relations between neighbors",
            "c" => "The railroad\u2019s reliance on time schedules",
            "d" => "People\u2019s agreement on the measurement of time",
            "key" => "d",
            "no" => "0"
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('card'),
            "test" => 'reading',
            "page_title" => 'READING',
            "page_subtitle" => 'COMPREHENSION',
            "title" => 'START',
            "subtitle" => 'Now begin work on the questions',
            "content" => "-"
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('paragraph'),
            "test" => 'reading',
            "page_title" => 'READING',
            "page_subtitle" => 'COMPREHENSION',
            "title" => "-",
            "subtitle" => "-",
            "paragraph_title" => "Questions 1-10",
            "paragraph" => "In the later part of the nineteenth century, the direction of expansion in the 
United States shifted from the countryside to the city. During the crises of the 1870s 
and the 1890s, tens of thousands of families abandoned their farms and ranches and 
headed for urban areas. Even prosperity produced migration from the countryside to 
the city. As pioneers settled rural districts, eventually the number of farms or ranches 
approached the maximum number the land would support. Landowners sought to 
increase their productivity through mechanization, and those who were successful 
invested their returns in the purchase of additional land and equipment, expanding their 
holdings by buying the farms of less fortunate neighbors, who moved on. Compare this 
pattern of economic development with that of the city, where innovations in 
manufacturing led to the creation of new opportunities and new jobs. But in the 
countryside, economic development inevitably meant depopulation. Rural areas in the 
central part of the country had begun to lose population by the 1880s, and over the next 
half century most of the rural West was overtaken by this trend. For every industrial 
worker who became a farmer, 20 young men from farms rushed to the city to compete 
for his job. 
Less well-known is the fact that for every 20 young farm men, as many as 25 or 
30 young farm women moved from the rural West to the cities. As a government report 
noted in 1920, young farm women were more likely to leave the farm and move to a 
western city than were young farm men. This amounted to a stunning reversal of the 
traditional pattern of western urban settlement, which featured the presence of many 
young, unattached men among the migrants but almost no single women. 
What explains the greater rates of female migration to the cities? In the opinion of 
many contemporaries, young women were pushed out of the countryside by constricted 
opportunities, particularly limited educational and vocational options.",
            "a" => "-",
            "b" => "-",
            "c" => "-",
            "d" => "-",
            "key" => "-",
            "no" => "0",
            "timer" => 200
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('paragraph'),
            "test" => 'reading',
            "page_title" => 'READING',
            "page_subtitle" => 'EXAMPLE',
            "title" => "What aspect of the United States in the late nineteenth and early twentieth centeruies does the passage mainly discuss?",
            "subtitle" => "-",
            "paragraph_title" => "Questions 1-10",
            "paragraph" => "In the later part of the nineteenth century, the direction of expansion in the 
United States shifted from the countryside to the city. During the crises of the 1870s 
and the 1890s, tens of thousands of families abandoned their farms and ranches and 
headed for urban areas. Even prosperity produced migration from the countryside to 
the city. As pioneers settled rural districts, eventually the number of farms or ranches 
approached the maximum number the land would support. Landowners sought to 
increase their productivity through mechanization, and those who were successful 
invested their returns in the purchase of additional land and equipment, expanding their 
holdings by buying the farms of less fortunate neighbors, who moved on. Compare this 
pattern of economic development with that of the city, where innovations in 
manufacturing led to the creation of new opportunities and new jobs. But in the 
countryside, economic development inevitably meant depopulation. Rural areas in the 
central part of the country had begun to lose population by the 1880s, and over the next 
half century most of the rural West was overtaken by this trend. For every industrial 
worker who became a farmer, 20 young men from farms rushed to the city to compete 
for his job. 
Less well-known is the fact that for every 20 young farm men, as many as 25 or 
30 young farm women moved from the rural West to the cities. As a government report 
noted in 1920, young farm women were more likely to leave the farm and move to a 
western city than were young farm men. This amounted to a stunning reversal of the 
traditional pattern of western urban settlement, which featured the presence of many 
young, unattached men among the migrants but almost no single women. 
What explains the greater rates of female migration to the cities? In the opinion of 
many contemporaries, young women were pushed out of the countryside by constricted 
opportunities, particularly limited educational and vocational options.",
            "a" => "Why young women chose to move from farms to cities",
            "b" => "The number and types of manufacturing jobs created in cities",
            "c" => "Changes in settlement patterns between farms and cities",
            "d" => "The effects of mechanization on western migration",
            "key" => "c",
            "no" => "1"
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('paragraph'),
            "test" => 'reading',
            "page_title" => 'READING',
            "page_subtitle" => 'EXAMPLE',
            "title" => "The word \u201cexpansion\u201d in line 1 is closest in meaning to",
            "subtitle" => "-",
            "paragraph_title" => "Questions 1-10",
            "paragraph" => "In the later part of the nineteenth century, the direction of expansion in the 
United States shifted from the countryside to the city. During the crises of the 1870s 
and the 1890s, tens of thousands of families abandoned their farms and ranches and 
headed for urban areas. Even prosperity produced migration from the countryside to 
the city. As pioneers settled rural districts, eventually the number of farms or ranches 
approached the maximum number the land would support. Landowners sought to 
increase their productivity through mechanization, and those who were successful 
invested their returns in the purchase of additional land and equipment, expanding their 
holdings by buying the farms of less fortunate neighbors, who moved on. Compare this 
pattern of economic development with that of the city, where innovations in 
manufacturing led to the creation of new opportunities and new jobs. But in the 
countryside, economic development inevitably meant depopulation. Rural areas in the 
central part of the country had begun to lose population by the 1880s, and over the next 
half century most of the rural West was overtaken by this trend. For every industrial 
worker who became a farmer, 20 young men from farms rushed to the city to compete 
for his job. 
Less well-known is the fact that for every 20 young farm men, as many as 25 or 
30 young farm women moved from the rural West to the cities. As a government report 
noted in 1920, young farm women were more likely to leave the farm and move to a 
western city than were young farm men. This amounted to a stunning reversal of the 
traditional pattern of western urban settlement, which featured the presence of many 
young, unattached men among the migrants but almost no single women. 
What explains the greater rates of female migration to the cities? In the opinion of 
many contemporaries, young women were pushed out of the countryside by constricted 
opportunities, particularly limited educational and vocational options.",
            "a" => "Change",
            "b" => "Growth",
            "c" => "Population ",
            "d" => "Labor",
            "key" => "b",
            "no" => "2"
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('paragraph'),
            "test" => 'reading',
            "page_title" => 'READING',
            "page_subtitle" => 'EXAMPLE',
            "title" => "The word \"abandoned\" in line 3 is closest in meaning to",
            "subtitle" => "-",
            "paragraph_title" => "Questions 1-10",
            "paragraph" => "In the later part of the nineteenth century, the direction of expansion in the 
United States shifted from the countryside to the city. During the crises of the 1870s 
and the 1890s, tens of thousands of families abandoned their farms and ranches and 
headed for urban areas. Even prosperity produced migration from the countryside to 
the city. As pioneers settled rural districts, eventually the number of farms or ranches 
approached the maximum number the land would support. Landowners sought to 
increase their productivity through mechanization, and those who were successful 
invested their returns in the purchase of additional land and equipment, expanding their 
holdings by buying the farms of less fortunate neighbors, who moved on. Compare this 
pattern of economic development with that of the city, where innovations in 
manufacturing led to the creation of new opportunities and new jobs. But in the 
countryside, economic development inevitably meant depopulation. Rural areas in the 
central part of the country had begun to lose population by the 1880s, and over the next 
half century most of the rural West was overtaken by this trend. For every industrial 
worker who became a farmer, 20 young men from farms rushed to the city to compete 
for his job. 
Less well-known is the fact that for every 20 young farm men, as many as 25 or 
30 young farm women moved from the rural West to the cities. As a government report 
noted in 1920, young farm women were more likely to leave the farm and move to a 
western city than were young farm men. This amounted to a stunning reversal of the 
traditional pattern of western urban settlement, which featured the presence of many 
young, unattached men among the migrants but almost no single women. 
What explains the greater rates of female migration to the cities? In the opinion of 
many contemporaries, young women were pushed out of the countryside by constricted 
opportunities, particularly limited educational and vocational options.",
            "a" => "Left behind",
            "b" => "Sold",
            "c" => "Gave away",
            "d" => "Gradually reduced the size of",
            "key" => "a",
            "no" => "3"
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('paragraph'),
            "test" => 'reading',
            "page_title" => 'READING',
            "page_subtitle" => 'EXAMPLE',
            "title" => "Why does the author discuss \u201cprosperity\u201d in line 4 ?",
            "subtitle" => "-",
            "paragraph_title" => "Questions 1-10",
            "paragraph" => "In the later part of the nineteenth century, the direction of expansion in the 
United States shifted from the countryside to the city. During the crises of the 1870s 
and the 1890s, tens of thousands of families abandoned their farms and ranches and 
headed for urban areas. Even prosperity produced migration from the countryside to 
the city. As pioneers settled rural districts, eventually the number of farms or ranches 
approached the maximum number the land would support. Landowners sought to 
increase their productivity through mechanization, and those who were successful 
invested their returns in the purchase of additional land and equipment, expanding their 
holdings by buying the farms of less fortunate neighbors, who moved on. Compare this 
pattern of economic development with that of the city, where innovations in 
manufacturing led to the creation of new opportunities and new jobs. But in the 
countryside, economic development inevitably meant depopulation. Rural areas in the 
central part of the country had begun to lose population by the 1880s, and over the next 
half century most of the rural West was overtaken by this trend. For every industrial 
worker who became a farmer, 20 young men from farms rushed to the city to compete 
for his job. 
Less well-known is the fact that for every 20 young farm men, as many as 25 or 
30 young farm women moved from the rural West to the cities. As a government report 
noted in 1920, young farm women were more likely to leave the farm and move to a 
western city than were young farm men. This amounted to a stunning reversal of the 
traditional pattern of western urban settlement, which featured the presence of many 
young, unattached men among the migrants but almost no single women. 
What explains the greater rates of female migration to the cities? In the opinion of 
many contemporaries, young women were pushed out of the countryside by constricted 
opportunities, particularly limited educational and vocational options.",
            "a" => "To indicate that more than one factor contributed to the movement from rural to urban settlement",
            "b" => "To support the idea that many families were able to stop farming and migrate to the cities",
            "c" => "To suggest that the migration would have happened despite the economic situation",
            "d" => "To argue against economics as the primary factor in migration",
            "key" => "c",
            "no" => "4"
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('paragraph'),
            "test" => 'reading',
            "page_title" => 'READING',
            "page_subtitle" => 'EXAMPLE',
            "title" => "According to the first paragraph, in the late 1800s, farmland was most likely to be purchased by",
            "subtitle" => "-",
            "paragraph_title" => "Questions 1-10",
            "paragraph" => "In the later part of the nineteenth century, the direction of expansion in the 
United States shifted from the countryside to the city. During the crises of the 1870s 
and the 1890s, tens of thousands of families abandoned their farms and ranches and 
headed for urban areas. Even prosperity produced migration from the countryside to 
the city. As pioneers settled rural districts, eventually the number of farms or ranches 
approached the maximum number the land would support. Landowners sought to 
increase their productivity through mechanization, and those who were successful 
invested their returns in the purchase of additional land and equipment, expanding their 
holdings by buying the farms of less fortunate neighbors, who moved on. Compare this 
pattern of economic development with that of the city, where innovations in 
manufacturing led to the creation of new opportunities and new jobs. But in the 
countryside, economic development inevitably meant depopulation. Rural areas in the 
central part of the country had begun to lose population by the 1880s, and over the next 
half century most of the rural West was overtaken by this trend. For every industrial 
worker who became a farmer, 20 young men from farms rushed to the city to compete 
for his job. 
Less well-known is the fact that for every 20 young farm men, as many as 25 or 
30 young farm women moved from the rural West to the cities. As a government report 
noted in 1920, young farm women were more likely to leave the farm and move to a 
western city than were young farm men. This amounted to a stunning reversal of the 
traditional pattern of western urban settlement, which featured the presence of many 
young, unattached men among the migrants but almost no single women. 
What explains the greater rates of female migration to the cities? In the opinion of 
many contemporaries, young women were pushed out of the countryside by constricted 
opportunities, particularly limited educational and vocational options.",
            "a" => "City businessmen seeking new investments",
            "b" => "Successful landowners who had mechanized farms",
            "c" => "Young farm men starting to work",
            "d" => "People who had few opportunities in cities",
            "key" => "b",
            "no" => "5"
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('paragraph'),
            "test" => 'reading',
            "page_title" => 'READING',
            "page_subtitle" => 'EXAMPLE',
            "title" => "The word \u201cinevitably\u201d in line 12 is closest in meaning to",
            "subtitle" => "-",
            "paragraph_title" => "Questions 1-10",
            "paragraph" => "In the later part of the nineteenth century, the direction of expansion in the 
United States shifted from the countryside to the city. During the crises of the 1870s 
and the 1890s, tens of thousands of families abandoned their farms and ranches and 
headed for urban areas. Even prosperity produced migration from the countryside to 
the city. As pioneers settled rural districts, eventually the number of farms or ranches 
approached the maximum number the land would support. Landowners sought to 
increase their productivity through mechanization, and those who were successful 
invested their returns in the purchase of additional land and equipment, expanding their 
holdings by buying the farms of less fortunate neighbors, who moved on. Compare this 
pattern of economic development with that of the city, where innovations in 
manufacturing led to the creation of new opportunities and new jobs. But in the 
countryside, economic development inevitably meant depopulation. Rural areas in the 
central part of the country had begun to lose population by the 1880s, and over the next 
half century most of the rural West was overtaken by this trend. For every industrial 
worker who became a farmer, 20 young men from farms rushed to the city to compete 
for his job. 
Less well-known is the fact that for every 20 young farm men, as many as 25 or 
30 young farm women moved from the rural West to the cities. As a government report 
noted in 1920, young farm women were more likely to leave the farm and move to a 
western city than were young farm men. This amounted to a stunning reversal of the 
traditional pattern of western urban settlement, which featured the presence of many 
young, unattached men among the migrants but almost no single women. 
What explains the greater rates of female migration to the cities? In the opinion of 
many contemporaries, young women were pushed out of the countryside by constricted 
opportunities, particularly limited educational and vocational options.",
            "a" => "Unexpectedly",
            "b" => "Usually",
            "c" => "Unavoidably",
            "d" => "Possibly",
            "key" => "c",
            "no" => "6"
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('paragraph'),
            "test" => 'reading',
            "page_title" => 'READING',
            "page_subtitle" => 'EXAMPLE',
            "title" => "The phrase \u201cthis trend\u201d in line 14 refers to",
            "subtitle" => "-",
            "paragraph_title" => "Questions 1-10",
            "paragraph" => "In the later part of the nineteenth century, the direction of expansion in the 
United States shifted from the countryside to the city. During the crises of the 1870s 
and the 1890s, tens of thousands of families abandoned their farms and ranches and 
headed for urban areas. Even prosperity produced migration from the countryside to 
the city. As pioneers settled rural districts, eventually the number of farms or ranches 
approached the maximum number the land would support. Landowners sought to 
increase their productivity through mechanization, and those who were successful 
invested their returns in the purchase of additional land and equipment, expanding their 
holdings by buying the farms of less fortunate neighbors, who moved on. Compare this 
pattern of economic development with that of the city, where innovations in 
manufacturing led to the creation of new opportunities and new jobs. But in the 
countryside, economic development inevitably meant depopulation. Rural areas in the 
central part of the country had begun to lose population by the 1880s, and over the next 
half century most of the rural West was overtaken by this trend. For every industrial 
worker who became a farmer, 20 young men from farms rushed to the city to compete 
for his job. 
Less well-known is the fact that for every 20 young farm men, as many as 25 or 
30 young farm women moved from the rural West to the cities. As a government report 
noted in 1920, young farm women were more likely to leave the farm and move to a 
western city than were young farm men. This amounted to a stunning reversal of the 
traditional pattern of western urban settlement, which featured the presence of many 
young, unattached men among the migrants but almost no single women. 
What explains the greater rates of female migration to the cities? In the opinion of 
many contemporaries, young women were pushed out of the countryside by constricted 
opportunities, particularly limited educational and vocational options.",
            "a" => "Industrial workers becoming farmers",
            "b" => "The economic development of the countryside",
            "c" => "The loss of rural population",
            "d" => "Innovations in manufacturing",
            "key" => "c",
            "no" => "7"
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('paragraph'),
            "test" => 'reading',
            "page_title" => 'READING',
            "page_subtitle" => 'EXAMPLE',
            "title" => "According to the first paragraph, which of the following is true about the population of the United States after the 1880s?",
            "subtitle" => "",
            "paragraph_title" => "Questions 1-10",
            "paragraph" => "In the later part of the nineteenth century, the direction of expansion in the 
United States shifted from the countryside to the city. During the crises of the 1870s 
and the 1890s, tens of thousands of families abandoned their farms and ranches and 
headed for urban areas. Even prosperity produced migration from the countryside to 
the city. As pioneers settled rural districts, eventually the number of farms or ranches 
approached the maximum number the land would support. Landowners sought to 
increase their productivity through mechanization, and those who were successful 
invested their returns in the purchase of additional land and equipment, expanding their 
holdings by buying the farms of less fortunate neighbors, who moved on. Compare this 
pattern of economic development with that of the city, where innovations in 
manufacturing led to the creation of new opportunities and new jobs. But in the 
countryside, economic development inevitably meant depopulation. Rural areas in the 
central part of the country had begun to lose population by the 1880s, and over the next 
half century most of the rural West was overtaken by this trend. For every industrial 
worker who became a farmer, 20 young men from farms rushed to the city to compete 
for his job. 
Less well-known is the fact that for every 20 young farm men, as many as 25 or 
30 young farm women moved from the rural West to the cities. As a government report 
noted in 1920, young farm women were more likely to leave the farm and move to a 
western city than were young farm men. This amounted to a stunning reversal of the 
traditional pattern of western urban settlement, which featured the presence of many 
young, unattached men among the migrants but almost no single women. 
What explains the greater rates of female migration to the cities? In the opinion of 
many contemporaries, young women were pushed out of the countryside by constricted 
opportunities, particularly limited educational and vocational options.",
            "a" => "Fewer people lived on farms.",
            "b" => "The central part of the United States lost much of its population to rural areas in the West.",
            "c" => "Rural areas of the West became more populated than those in the central part of the country",
            "d" => "Work opportunities in urban areas began to decline.",
            "key" => "a",
            "no" => "8"
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('paragraph'),
            "test" => 'reading',
            "page_title" => 'READING',
            "page_subtitle" => 'EXAMPLE',
            "title" => "According to the second paragraph, how did migration among young women in the rural West differ from that of young men?",
            "subtitle" => "-",
            "paragraph_title" => "Questions 1-10",
            "paragraph" => "In the later part of the nineteenth century, the direction of expansion in the 
United States shifted from the countryside to the city. During the crises of the 1870s 
and the 1890s, tens of thousands of families abandoned their farms and ranches and 
headed for urban areas. Even prosperity produced migration from the countryside to 
the city. As pioneers settled rural districts, eventually the number of farms or ranches 
approached the maximum number the land would support. Landowners sought to 
increase their productivity through mechanization, and those who were successful 
invested their returns in the purchase of additional land and equipment, expanding their 
holdings by buying the farms of less fortunate neighbors, who moved on. Compare this 
pattern of economic development with that of the city, where innovations in 
manufacturing led to the creation of new opportunities and new jobs. But in the 
countryside, economic development inevitably meant depopulation. Rural areas in the 
central part of the country had begun to lose population by the 1880s, and over the next 
half century most of the rural West was overtaken by this trend. For every industrial 
worker who became a farmer, 20 young men from farms rushed to the city to compete 
for his job. 
Less well-known is the fact that for every 20 young farm men, as many as 25 or 
30 young farm women moved from the rural West to the cities. As a government report 
noted in 1920, young farm women were more likely to leave the farm and move to a 
western city than were young farm men. This amounted to a stunning reversal of the 
traditional pattern of western urban settlement, which featured the presence of many 
young, unattached men among the migrants but almost no single women. 
What explains the greater rates of female migration to the cities? In the opinion of 
many contemporaries, young women were pushed out of the countryside by constricted 
opportunities, particularly limited educational and vocational options.",
            "a" => "Young women were more likely to leave rural areas to go to urban areas.",
            "b" => "Young women were more likely to take jobs on farms.",
            "c" => "Young women who migrated generally had more education.",
            "d" => "Young women generally moved more frequently from one rural area to another.",
            "key" => "a",
            "no" => "9"
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('paragraph'),
            "test" => 'reading',
            "page_title" => 'READING',
            "page_subtitle" => 'EXAMPLE',
            "title" => "The word \u201cconstricted\u201d in line 24 is closest in meaning to",
            "subtitle" => "-",
            "paragraph_title" => "Questions 1-10",
            "paragraph" => "In the later part of the nineteenth century, the direction of expansion in the 
United States shifted from the countryside to the city. During the crises of the 1870s 
and the 1890s, tens of thousands of families abandoned their farms and ranches and 
headed for urban areas. Even prosperity produced migration from the countryside to 
the city. As pioneers settled rural districts, eventually the number of farms or ranches 
approached the maximum number the land would support. Landowners sought to 
increase their productivity through mechanization, and those who were successful 
invested their returns in the purchase of additional land and equipment, expanding their 
holdings by buying the farms of less fortunate neighbors, who moved on. Compare this 
pattern of economic development with that of the city, where innovations in 
manufacturing led to the creation of new opportunities and new jobs. But in the 
countryside, economic development inevitably meant depopulation. Rural areas in the 
central part of the country had begun to lose population by the 1880s, and over the next 
half century most of the rural West was overtaken by this trend. For every industrial 
worker who became a farmer, 20 young men from farms rushed to the city to compete 
for his job. 
Less well-known is the fact that for every 20 young farm men, as many as 25 or 
30 young farm women moved from the rural West to the cities. As a government report 
noted in 1920, young farm women were more likely to leave the farm and move to a 
western city than were young farm men. This amounted to a stunning reversal of the 
traditional pattern of western urban settlement, which featured the presence of many 
young, unattached men among the migrants but almost no single women. 
What explains the greater rates of female migration to the cities? In the opinion of 
many contemporaries, young women were pushed out of the countryside by constricted 
opportunities, particularly limited educational and vocational options.",
            "a" => "Unappealing",
            "b" => "Reduced",
            "c" => "Low-paying",
            "d" => "Disappearing",
            "key" => "b",
            "no" => "10"
        ]);

        Soal::create([
            "index" => $ind++,
            "type_test" => $this->get_jenis_test('pre test'),
            "type_soal" => $this->get_jenis_soal('card'),
            "test" => 'reading',
            "page_title" => '',
            "page_subtitle" => '',
            "title" => 'THANK YOU',
            "subtitle" => 'THE END',
            "content" => "Info pendaftaran TOEFL ITP RUTIN <br>http:\/\/blc.ub.ac.id\/tata-cara-itp-rutin-byop-bring-your-own-proctor\/"
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
