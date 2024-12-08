<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "movie_ticketing");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Mga movie datas pwede kayo mag lagay ng movie and lagyan nyo ng id sundan nyo lng ung code base
$movies = [
    //Dto mo malalagyan ng bagong movie or imod : image , genre, cost, banner-image,  carousel-image, synopsis
    // Ung mga HTTP Links un ung movie image
    //
    ['id' => 1, 'title' => '1917', 'genre' => 'Action', 'Synopsis' => '1917 is a 2019 war film directed and produced by Sam Mendes, who co-wrote it with Krysty Wilson-Cairns Partially inspired by stories told to Mendes by his paternal grandfather Alfred about his service during World War I,[6] the film takes place after the German retreat to the Hindenburg Line during Operation Alberich, and follows two British soldiers, Will Schofield (George MacKay) and Tom Blake
     (Dean-Charles Chapman), in their mission to deliver an important message to call off a doomed offensive attack. Mark Strong, Andrew Scott, Richard Madden, Claire Duburcq, Colin Firth, Adrian Scarborough, and Benedict Cumberbatch also star in supporting roles.', 'star_rating' => 4.7, 'cost' => 11.99, 'image_urls' => ['../images/1972.jpg', '../images/a.jpg', '../images/b.jpg'], 'flash_screen' => '../images/1917POSTER.jpg'],
    ['id' => 2, 'title' => 'Gone Girl', 'genre' => 'Drama', 'Synopsis' => 'A man becomes the prime suspect in his wife disappearance, but as the investigation unfolds, the truth about their marriage is revealed to be far more sinister than anyone could have imagined.       Strong Performances: Rosamund Pike performance as Amy Dunne was widely praised, often cited as a highlight of the film and a career-defining role 
    for the actress.  Ben Affleck performance as Nick Dunne, while sometimes divisive, was also generally well-received, particularly for its portrayal of a man under intense scrutiny.  Supporting actors like Neil Patrick Harris and Tyler Perry also garnered positive attention for their contributions     - Masterful Direction: David Fincher signature style is perfectly suited to the material, creating a dark, suspenseful atmosphere and visually stunning film. ',
     'star_rating' => 4.9, 'cost' => 14.99, 'image_urls' => ['../images/gonegirl2.jpg', '../images/gone2.webp', '../images/gonee.jpg'], 'flash_screen' => '../images/gg1.jpg'],
    ['id' => 3, 'title' => 'Barbie movie', 'genre' => 'Fantasy', 'Synopsis' => 'Barbie and Ken are having the time of their lives in the colorful and seemingly perfect world of Barbie Land. However, when they get a chance to go to the real world, they soon discover the joys and perils of living among humans.
    Barbie the Doll lives in bliss in the matriarchal society of Barbieland feeling good about her role in the world in the various iterations of Barbies over the years showing girls that play with her that they can be whatever and whoever they want. On the flip side, Ken, who also lives in Barbieland, is unnoticed except in relation to Barbie, which is however one step above any other doll in Barbieland, such as Allan. One day, Stereotypical Barbie
     begins to have feelings which she never experienced which leads to her world seemingly falling apart. Weird Barbie determines that there is something happening in the real world with someone playing with her being unhappy leading to Stereotypical Barbie reluctantly heading to the real world to rectify what is happening with that person, she first needing to find this person. ', 
     'star_rating' => 4.5, 'cost' => 13.99, 'image_urls' => ['../images/barbie.jpg', '../images/bar.jpg', '../images/bie.jpg'], 'flash_screen' => '../images/barb.webp'],
     ['id' => 4, 'title' => 'Tenement', 'genre' => 'Horror', 'Synopsis' => 'Following the death of her mother, a Japanese-Cambodian manga artist decides to travel to Cambodia along with her boyfriend, in a quest to find out more about the country her mother fled. She reunites with lost family and moves into the apartment where her mother used to live. As she tries to find out more about her past, she
      confronted to strange events within the building that hint at something darker going on with the residents. What first appears as over-caring considerations from the community towards the newcomers soon turns out to be part of a ritual. The residents are preparing a new host for the buildings evil spirit, before it starts killing them once again.', 'star_rating' => 4.9, 'cost' => 15.00, 'image_urls' => ['../images/tenem.jpg', '../images/tenement1.jfif', '../images/tene.jfif'], 'flash_screen' => '../images/tenement.jfif'],
    ['id' => 5, 'title' => 'Inside Out 2 ', 'genre' => 'Fantasy', 'Synopsis' => 'Inside Out 2 is an animated coming-of-age film that explores the ups and downs of growing up ¹. The movie follows Riley as she navigates high school, friendships, and her emotions, which are personified as Joy, Sadness, Fear, Disgust, Anger, and new emotions like Anxiety, Envy, Embarrassment, and Ennui ¹. With themes of self-discovery, relationships, and emotional intelligence.
     Inside Out 2 falls under the genre of Animated Coming-of-Age Comedy-Drama ¹.The films storyline, character development, and emotional depth make it a great example of a coming-of-age movie. The animation and humor add a lighthearted touch, while the themes and emotions explored make it a relatable and engaging watch for audiences of all ages ¹.
', 'star_rating' => 4.6, 'cost' => 10.00, 'image_urls' => ['../images/ito.jpg', '../images/outside.jpeg', '../images/inout.webp'], 'flash_screen' => '../images/inside.jpg'],
    ['id' => 6, 'title' => 'Jumanji', 'genre' => 'Fantasy', 'Synopsis' => 'Jumanji is a 1995 American dark fantasy adventure film directed by Joe Johnston from a screenplay by Jonathan Hensleigh, Greg Taylor, and Jim Strain, based on the 1981 childrens picture book of the same name by Chris Van Allsburg. The film is the first installment in the Jumanji film series and stars Robin Williams, Kirsten Dunst, David Alan Grier, Bonnie Hunt, Jonathan Hyde, and Bebe Neuwirth. The story centers on 
    a supernatural board game that releases junglebased hazards on its players with every turn they take.', 'star_rating' => 4.6, 'cost' => 10.00, 'image_urls' => ['../images/Jum.webp', '../images/manji.jpg', '../images/anji.jpg'], 'flash_screen' => '../images/Jumanji.jpg'],
    ['id' => 7, 'title' => 'Dreams On Fire (ドリームズ・オン・ファイア)', 'genre' => 'Drama', 'Synopsis' => 'Fleeing to Tokyo with the hopes that she can fulfill her dream of becoming a dancer, Yume is met with the harsh reality that success is not something that comes quickly or easily. Whilst juggling her job as a hostess in Tokyos red-light district, Yume throws herself headfirst into studying the artform and integrating herself into the underground dance community. Starring one of Japans most famous dancers, Bambi Naka, in her
     first lead role, Dreams on Fire is a vibrant and intoxicating look into Japanese dance and subculture communities that echoes films like Coyote Ugly and Step Up.‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ 
     ‎ ‎‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ Native Title: ドリームズ・オン・ファイア‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ 
     ‎ ‎‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ 
      ‎ ‎ ‎  ‎ ‎ Screenwriter & Director: Philippe McKie‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎
      ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ Genres: Music, Drama‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ 
      ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ 
      ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎‎ ‎ ‎ ‎ ‎ ‎‎ ‎ ‎ ‎ ‎ ‎‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎Tags: Difficult Adulthood, Host/Hostess Club Setting, Hostess Female Lead, Dancer Female Lead, ‎ ‎ ‎ ‎ ‎ ‎‎ ‎ ‎ ‎ ‎ ‎‎ ‎ ‎ ‎ ‎ ‎Chasing A Dream, Nightlife, Healing, Dance (Vote or add tags)‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ 
      ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ 
     Country: Japan ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ 
      ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎‎ ‎ Type: Movie‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ 
      ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ 
      ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎‎ ‎ ‎ ‎ ‎ ‎‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎‎ ‎ ‎ ‎ ‎ ‎‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎‎ ‎ ‎ ‎ ‎ ‎‎ ‎ ‎ ‎ ‎ ‎Release Date: Mar 13, 2021‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎  ‎ ‎‎ ‎ ‎ 
      ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎‎ ‎ ‎ ‎ ‎ ‎‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎  Duration: 2 hr. 4 min.‎ ‎ ‎
       ‎ ‎ ‎ ‎ ‎ ‎ ‎‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ 
       ‎ ‎‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎‎ ‎ ‎ ‎ ‎ ‎‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎‎ ‎ ‎ ‎ ‎ ‎‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎‎ ‎ ‎ Content Rating: G - All Ages' , 'star_rating' => 4.8, 'cost' => 12.00, 'image_urls' => ['../images/dream.jpg', '../images/on.jpg', '../images/p5.jpg'], 'flash_screen' => '../images/fire.webp'],
    ['id' => 8, 'title' => 'The Fallout', 'genre' => 'Drama', 'Synopsis' => 'Bolstered by new friendships forged under sudden and tragic circumstances, high school student Vada begins to reinvent herself while reevaluating her relationships and her view of
     the world. Moving away from her comfortable family routine, she starts taking chances with a series of decisions that test her own boundaries and push her in new directions. As she spends more time with Mia, they grow closer and Vada slowly redefines herself 
     through their shared experiences.

Release date: January 27, 2022 (USA)

Director: Megan Park

Distributed by: Warner Bros. Pictures

Music by: Finneas O Connell

Produced by: Shaun Sanghani; David Brown; Giulia Prenna; Joannie Burstein; Rebecca Miller; Cara Shine; Todd Lundbohm

Production companies: New Line Cinema; Clear Horizon; SSS Entertainment; The Burstein Company; 828 Media Capital; Clear Media Finance


The Fallout scored 91 percent on Rotten Tomatoes.', 'star_rating' => 4.8, 'cost' => 12.00, 'image_urls' => ['../images/fall2.jfif', '../images/ha.jpg', '../images/fal.jpg'], 'flash_screen' => '../images/fa.jpg'],
    ['id' => 9, 'title' => 'The Hurt Locker', 'genre' => 'Action', 'Synopsis' => 'An intense portrayal of elite soldiers who have one of the most dangerous jobs in the world: disarming bombs in the heat of combat. When a new sergeant, James, takes over a highly trained bomb disposal team amidst violent conflict, he surprises his two subordinates, Sanborn and Eldridge, by recklessly plunging them
     into a deadly game of urban combat, behaving as if he is indifferent to death. As the men struggle to control their wild new leader, the city explodes into chaos, and James true character reveals itself in a way that will change each man forever.', 'star_rating' => 4.8, 'cost' => 12.00, 'image_urls' => ['../images/hurt.jpeg', '../images/hurtlock.jpg', '../images/loc.jpg'], 
        'flash_screen' => '../images/the2.jpg'],
    ['id' => 10, 'title' => 'It', 'genre' => 'Horror', 'Synopsis' => 'Storyline
In the Town of Derry, the local kids are disappearing one by one. In a place known as The Barrens, a group of seven kids are united by their horrifying and strange encounters with an evil clown and their determination to kill It.', 'star_rating' => 4.8, 'cost' => 12.00, 'image_urls' => ['../images/it.jpg', '../images/i.webp', '../images/it2.jpg'], 'flash_screen' => '../images/t.jpg'],
    ['id' => 11, 'title' => 'Un/Happy for You', 'genre' => 'Romance', 'Synopsis' => 'Un/Happy for You is a 2024 Philippine romantic drama film directed by Petersen Vargas from a story and screenplay written by Kookai Labayen and Crystal San Miguel, with Simon Lloyd Arciaga and Jen Chuaunsu as the co-writers. It stars Joshua Garcia and Julia Barretto in their comeback film after four 
    years since they last acted together in Block Z.[2] The film is about how ex-lovers navigate feelings of anguish and deep affection with someone who once held a special place in their hearts. Two years after their breakup, Juancho (Joshua Garcia), a Bicolano chef, on the rise reunites with Zy (Julia Barretto), his ex-girlfriend, who is back in the province for a brief work visit. 
    Still feeling bitter about their breakup, he tries to seduce her to ruin her engagement, only to find himself falling for her once more.', 'star_rating' => 4.8, 'cost' => 12.00, 'image_urls' => ['../images/un2.jpg', '../images/un.jpg', '../images/hap.jpg'], 'flash_screen' => '../images/un.jpg'],
    ['id' => 12, 'title' => 'Guy Ritchies The Covenant', 'genre' => 'Action', 'Synopsis' => '', 'star_rating' => 4.8, 'cost' => 12.00, 'image_urls' => ['../images/cov.jpg', '../images/c.jpg', '../images/c3.jpg'], 'flash_screen' => '../images/c2.png'],
    ['id' => 13, 'title' => 'Rewind', 'genre' => 'Romance', 'Synopsis' => 'John is a hard-working office employee who maintains an aloof relationship with his wife Mary and son Austin. Frustrated after his boss Hermie passes him over for promotion in favor of a younger colleague, Vivian, John confronts Hermie and submits his resignation. While clearing his office, John is visited 
    by Vivian who shares a kiss with him. The next day, John and Mary argue on their way to Austins play over Johns resignation and his fling with Vivian, which Mary learns from a video discreetly recorded by Johns colleague Hannah. Distracted, John narrowly avoids hitting a pedestrian but loses control of their car, which crashes into a tree, killing Mary at exactly 3:00 PM.

Days later, an intoxicated John lashes out over his predicament at a portrait of Jesus Christ which Austin had named Lods before stumbling upon Jess, an electrician who is also nicknamed Lods and resembles Jesus. After learning that Mary had hired Lods to prepare the lights for his surprise birthday party, John invites him over to share a drink, during which Lods offers him a chance to go back in time, 
save Mary and fix his mistakes with one condition: someone has to die that day. John offers to do so and seals the deal with Jess. John then finds himself at Hermies birthday party, during which he was passed over for promotion. Fixing his earlier mistakes, John tells Hermie of his acceptance of his sidelining, wards off Vivians advances, and checks on Hannah before she can record them. John reconciles
 with his estranged father. He then goes to his son, giving him his blessing for Austin to pursue his passion as a pianist and take Mary out on a date.

The next morning, John argues with Mary after discovering her plans to enroll at a culinary school in Singapore accompanied by Austin, who was accepted in a music academy there, with Mary saying that she wants to pursue her dreams also. John, who feels that his efforts have been in vain with his familys departure, confronts Lods, who is preparing some lights in the yard. In response, Lods chastises him for 
being selfish and offers to let Mary die as originally intended, but John refuses. En route to Austins play, John gives his blessing for her to go with Austin. At the moment of the accident, John avoids colliding with the tree, saving Mary.

While watching Austin’s play, John sees Lods in the audience and realizes that it is nearing 3:00 PM, the time Mary was supposed to have died. After going out and encountering Lods in a hallway, John pleads for his life to be spared, but finally accepts his fate after Lods assures him that his death would inspire Mary to become a successful restaurateur and Austin to become a renowned pianist who dedicates 
his performances to his name. Lods then allows him to go finish his sons play before dying. At the auditorium, John sees Austin dedicating his play to his parents. John prepares to greet him but is confused after Austin ignores him and runs towards the hall. Following him outside, he sees Austin hovering over his collapsed body, followed by Mary. John realizes that he is already dead and steps into a bright light leading to the afterlife.

', 'star_rating' => 4.8, 'cost' => 12.00, 'image_urls' => ['../images/ind.jpg', '../images/eh.jpg', '../images/6.jpg'], 'flash_screen' => '../images/wind.jpg'],
    ['id' => 14, 'title' => 'The Nun', 'genre' => 'Horror', 'Synopsis' => 'Peter Parker, with the help of Doctor Strange, must face a new threat.', 'star_rating' => 4.8, 'cost' => 12.00, 'image_urls' => ['https://via.placeholder.com/150', '../images/nun.jpg', '../images/nu.jpg'], 'flash_screen' => '../images/the.jpg'],
    ['id' => 15, 'title' => 'Spider-Man: No Way Home', 'genre' => 'Romance', 'Synopsis' => 'Peter Parker, with the help of Doctor Strange, must face a new threat.', 'star_rating' => 4.8, 'cost' => 12.00, 'image_urls' => ['https://via.placeholder.com/150', 'https://via.placeholder.com/160', 'https://via.placeholder.com/170'], 'flash_screen' => 'https://via.placeholder.com/600x300'],
];

$moviesByGenre = [];
foreach ($movies as $movie) {
    $moviesByGenre[$movie['genre']][] = $movie;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Movies Overview</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style/glass_pane.css">
    <style>
        h1::first-line{
            color: green;
            height: 100vh;
            width: 50%;
            align-items: center;
            justify-content: space-around;
        }

       /* h1::before{
            content: url("../images/vieketlogo.jpg");
        } */
        
        img{
            width: 80px;
            height: 120px;
            object-fit: cover;
        }
        </style>
</head>
<body class="bg-dark">
    
    <h1>VIEKET</h1>
    <img src="../images/vieketlogo.jpg">
    
<div class="container mt-5">
    <?php foreach ($moviesByGenre as $genre => $movies): ?>
        <h3 class="text-white"><?php echo htmlspecialchars($genre); ?></h3>
        <div class="d-flex flex-wrap">
            <?php foreach ($movies as $movie): ?>
                <div class="<?php echo $movie['star_rating'] >= 4 ? 'card-glass' : 'card'; ?>">
                    <h5><?php echo htmlspecialchars($movie['title']); ?></h5>
                    <img src="<?php echo htmlspecialchars($movie['image_urls'][0]); ?>" class="movie-image" alt="<?php echo htmlspecialchars($movie['title']); ?>">
                    
                    <button class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#movieModal<?php echo $movie['id']; ?>">
                        View Details
                       
                    </button>
                </div>

                <!-- Movie Details Modal -->
                <div  class="modal fade" id="movieModal<?php echo $movie['id']; ?>" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title"><?php echo htmlspecialchars($movie['title']); ?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="text-center">

                                    <!-- Movie Carousel -->
                                    <div id="carousel<?php echo $movie['id']; ?>" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-inner">
                                            <?php foreach ($movie['image_urls'] as $index => $image_url): ?>
                                                <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                                                    
                                                    <img src="<?php echo htmlspecialchars($image_url); ?>" class="d-block w-100 movie-image" style="height:430px"  alt="<?php echo htmlspecialchars($movie['title']); ?>">
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                        <button class="carousel-control-prev" type="button" data-bs-target="#carousel<?php echo $movie['id']; ?>" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#carousel<?php echo $movie['id']; ?>" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                </div>
                                
                                <p><strong>Synopsis:</strong> <?php echo htmlspecialchars($movie['Synopsis']); ?></p>
                                <p><strong>Ticket Cost:</strong> $<?php echo htmlspecialchars($movie['cost']); ?></p>
                                <label for="showDate"><strong>Select Show Date:</strong></label>
                                <input type="date" id="showDate<?php echo $movie['id']; ?>" name="showDate" class="form-control" required>
                                <img src="<?php echo htmlspecialchars($movie['flash_screen']); ?>" alt="Flash Screen" class="flash-screen">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <a href="book_ticket.php?movie_id=<?php echo $movie['id']; ?>&showDate=" class="btn btn-primary" id="bookButton<?php echo $movie['id']; ?>" onclick="setShowDate(<?php echo $movie['id']; ?>)">Book Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function setShowDate(movieId) {
        var showDateInput = document.getElementById('showDate' + movieId);
        var bookButton = document.getElementById('bookButton' + movieId);
        bookButton.href = bookButton.href + showDateInput.value;
    }
</script>
</body>
</html>
