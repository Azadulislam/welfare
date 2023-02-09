-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2023 at 12:36 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `helth_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `bodyparts`
--

CREATE TABLE `bodyparts` (
  `bodypart_id` int(11) NOT NULL,
  `bodypart_title` varchar(150) NOT NULL,
  `bodypart_image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bodyparts`
--

INSERT INTO `bodyparts` (`bodypart_id`, `bodypart_title`, `bodypart_image`) VALUES
(1, 'Biceps', 'bodypart_1517098401.jpg'),
(2, 'Quadriceps', 'bodypart_1517098193.jpg'),
(3, 'Chest', 'bodypart_1517097822.png'),
(4, 'Triceps', 'bodypart_1517097991.jpg'),
(5, 'Abs', 'bodypart_1517098045.jpg'),
(6, 'Shoulders', 'bodypart_1517098824.jpg'),
(7, 'Back', 'bodypart_1519938334.jpg'),
(8, 'Glutes', 'bodypart_1519938334.jpg'),
(9, 'Obliques', 'bodypart_1519938334.jpg'),
(10, 'Calf', 'bodypart_1519938334.jpg'),
(11, 'Shoulders', 'bodypart_1519938334.jpg'),
(12, 'Calves', 'bodypart_1519938334.jpg'),
(13, 'Core', 'bodypart_1519938334.jpg'),
(14, 'Hamstrings', 'bodypart_1519938334.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `category_image` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`, `category_image`) VALUES
(1, 'Fat Loss', 'catdiet_1516827171.jpg'),
(2, 'Muscle Gain', 'catdiet_1516827177.jpg'),
(3, 'Vegetarian', 'catdiet_1516827183.jpg'),
(4, 'Protein Shakes', 'catdiet_1518094768.jpg'),
(5, 'Body Weight', 'catdiet_1518094768.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `diets`
--

CREATE TABLE `diets` (
  `diet_id` int(11) NOT NULL,
  `diet_title` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `diet_description` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `diet_ingredients` text NOT NULL,
  `diet_category` int(11) NOT NULL,
  `diet_directions` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `diet_calories` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `diet_carbs` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `diet_protein` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `diet_fat` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `diet_time` varchar(50) NOT NULL,
  `diet_servings` varchar(50) NOT NULL,
  `diet_featured` varchar(50) NOT NULL,
  `diet_status` varchar(50) NOT NULL,
  `diet_image` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `diets`
--

INSERT INTO `diets` (`diet_id`, `diet_title`, `diet_description`, `diet_ingredients`, `diet_category`, `diet_directions`, `diet_calories`, `diet_carbs`, `diet_protein`, `diet_fat`, `diet_time`, `diet_servings`, `diet_featured`, `diet_status`, `diet_image`) VALUES
(1, 'Greek Spinach and Artichoke Dip', '<p>Lighten up this spinach-artichoke spread with Greek yogurt and pita chips. It makes for the perfect low-cal yet traditional appetizer you can serve at a party that won&#39;t have people running for the door.</p>', '<ul><li>2 tsp olive oil</li><li>2 garlic cloves, minced</li><li>10 oz frozen spinach, thawed and drained</li><li>1 (14 oz) can artichoke hearts, drained and chopped</li><li>1 cup plain nonfat Greek yogurt</li><li>1 cup reduced-fat cream cheese</li><li>&frac12; cup grated Parmesan cheese</li><li>Salt and pepper</li></ul>', 1, '<ol><li>Heat oil in a large saucepan over medium heat. Add garlic, spinach, and artichokes. Cook until tender, about 5 minutes.</li><li>Stir in yogurt and cream cheese. Add Parmesan and salt and pepper to taste. Cook, stirring occasionally, until thickened, 5 to 10 minutes. Serve warm.</li></ol>', '116', '9g', '7g', '7g', '15 Min', '8', '1', '1', 'recipe_1518024640.jpg'),
(2, 'Tangy Barbecue Chicken', '<p>If chicken breast is among your favorite go-tos for a tasty and reliable protein fix, you&#39;ll want to add this dish to your muscle-building arsenal. This version gets its kick from tangy apple cider vinegar and spicy mustard paired with just a little bit of brown sugar and ketchup.</p>', '<ul><li>2/3 cup apple cider vinegar</li><li>1/2 cup yellow mustard</li><li>1 tsp onion powder</li><li>1 tsp garlic powder</li><li>2 pinches salt</li><li>1/8 cup brown sugar</li><li>1/2 cup low-sodium ketchup</li><li>4 chicken breasts</li></ul>', 1, '<ol><li>Preheat grill. Place all ingredients except chicken in a sauce pan. Heat over medium flame, cooking until contents are reduced by 50%.</li><li>Spread barbecue sauce on chicken breasts and place on grill. (Sauce can also be cooled for later use.)</li><li>Grill breasts 4-5 minutes on each side, or until no longer pink inside.</li></ol>', '308', '12g', '52g', '2g', '60 Min', '4', '1', '1', 'recipe_1518028133.jpg'),
(3, 'Chicken, Asparagus, and Brie Omelet', '<p>Cooking your chicken in bulk is the smart way to prep your meals for the week.</p><p>However, you&rsquo;ll inevitably be left with extra portions taking up space in your fridge. And then what are you going to do? Wait a few days, until it&rsquo;s dry and rubbery, before using it to make a batch of uninspired, slapdash snacks?</p><p>You&rsquo;re better than that. Instead, use it to whip up three days&rsquo; worth of mouth-watering, muscle-making meals that are healthy to boot.</p><p>Bonus: The soup recipe will have even four-day-old chicken tasting as moist and succulent as the day you cooked it up.</p>', '<ul><li>2 large eggs</li><li>4 egg whites</li><li>1/8 tsp salt</li><li>1/8 tsp ground black pepper</li><li>Cooking spray</li><li>1 1/2 oz leftover skinless chicken, chopped</li><li>6 cooked asparagus spears, cut into 1/4-inch pieces</li><li>1 1/2 oz brie</li><li>1/4 cup leftover cranberry sauce (optional)</li></ul>', 2, '<ol><li>In a small bowl, whisk eggs, egg whites, salt, and black pepper.</li><li>Coat large skillet with cooking spray and heat over medium heat. Pour in egg mixture.</li><li>When the edges begin to set, push the cooked portion toward the center with a spatula. Tilt the skillet so any uncooked egg reaches the hot pan. When eggs set, add chicken and asparagus to one side. Cook for 1 minute. Add brie and cook 1 to 2 minutes, until the cheese melts.</li><li>Fold omelet in half and serve with cranberry sauce, if desired.</li></ol>', '263', '25g', '15g', '12g', '30 Min', '2', '0', '1', 'recipe_1519697004.jpg'),
(4, 'Spicy Chicken and Root Vegetable Soup', '<p>Cooking your chicken in bulk is the smart way to prep your meals for the week.</p><p>However, you&rsquo;ll inevitably be left with extra portions taking up space in your fridge. And then what are you going to do? Wait a few days, until it&rsquo;s dry and rubbery, before using it to make a batch of uninspired, slapdash snacks?</p><p>You&rsquo;re better than that. Instead, use it to whip up three days&rsquo; worth of mouth-watering, muscle-making meals that are healthy to boot.</p><p>Bonus: The soup recipe will have even four-day-old chicken tasting as moist and succulent as the day you cooked it up.</p>', '<ul><li>1 cup packed baby spinach</li><li>1 tbsp olive oil</li><li>1 medium onion, chopped</li><li>1 medium carrot, chopped</li><li>1 celery rib, chopped</li><li>1 medium turnip, chopped</li><li>1 (15 oz) can brown lentils, drained</li><li>6 oz leftover skinless chicken, shredded</li><li>6 cups (48 fluid oz) low-sodium chicken stock</li><li>1 tbsp mirin (Japanese sweet rice wine found in the Asian-foods aisle)</li><li>2 bay leaves</li><li>1/8 tsp cayenne</li></ul>', 2, '<ol><li>Stack spinach leaves, roll, then slice into ribbons.</li><li>Heat oil in a large pot over medium heat. When simmering, add onion, carrot, celery, and turnip. Cook until onion is translucent, about 4 minutes. Add lentils, chicken, stock, mirin, and bay leaves; stir to combine. Turn heat up to high and bring to a boil, then reduce heat, cover, and simmer until lentils are tender, about 20 minutes.</li><li>Remove bay leaves. Stir in cayenne and spinach. Ladle into bowls.</li></ol>', '273', '32g', '25g', '8g', '60 Min', '4', '1', '1', 'recipe_1519697891.jpg'),
(5, 'Chicken-walnut Salad With Pomegranate Seeds', '<p>Cooking your chicken in bulk is the smart way to prep your meals for the week.</p><p>However, you&rsquo;ll inevitably be left with extra portions taking up space in your fridge. And then what are you going to do? Wait a few days, until it&rsquo;s dry and rubbery, before using it to make a batch of uninspired, slapdash snacks?</p><p>You&rsquo;re better than that. Instead, use it to whip up three days&rsquo; worth of mouth-watering, muscle-making meals that are healthy to boot.</p><p>Bonus: The soup recipe will have even four-day-old chicken tasting as moist and succulent as the day you cooked it up.</p>', '<ul><li>8 oz leftover skinless chicken, chopped</li><li>1/2 medium onion, finely chopped</li><li>1 celery rib, finely chopped</li><li>1/4 cup (1 oz) finely chopped walnuts</li><li>2 tbsp pomegranate arils/seeds (or dried cranberries)</li><li>2 tbsp light mayonnaise</li><li>2 tbsp nonfat plain Greek yogurt</li><li>1 tbsp Dijon mustard</li><li>1 tsp fresh lemon juice</li><li>1/4 tsp salt</li><li>1/8 tsp ground black pepper</li><li>4 (8-inch) low-carb, whole-wheat flour tortillas</li></ul>', 1, '<ul><li>In a medium bowl, combine chicken, onion, celery, and walnuts with pomegranate arils.</li><li>In a small bowl, whisk together mayo, yogurt, mustard, lemon juice, salt, and black pepper until well-combined. Add to chicken. Stir to coat evenly.</li><li>Add chicken salad to tortillas. Fold the sides in; bring bottom up; roll to close.</li></ul>', '162', '25g', '17g', '6g', '40 Min', '4', '1', '1', 'recipe_1519698091.jpg'),
(6, 'Peanut-Banana Pancakes', '<p>Serve up this tasty, muscle-building breakfast that&#39;s loaded with protein.</p>', '<ul><li>&frac12; cup whole wheat or oat flour</li><li>&frac12; cup peanut flour</li><li>1 tsp baking powder</li><li>&frac12; tsp cinnamon</li><li>1 large egg, beaten</li><li>1 ripe banana, mashed</li><li>&frac12; cup low-fat cow&#39;s or goat&#39;s milk</li><li>⅓ cup walnuts, chopped</li><li>1 tbsp unsalted butter</li></ul>', 1, '<ol><li>In a large bowl, mix whole wheat flour, peanut flour, baking powder, and cinnamon. In a separate bowl, stir together egg, banana, and milk.</li><li>Add wet ingredients to dry ingredients and mix until moist.</li><li>Stir in additional milk if needed.</li><li>Gently stir walnuts into batter.</li><li>Heat a large skillet over medium.</li><li>Add butter and allow to melt.</li><li>Using a measuring cup, drop batter onto skillet and cook for approximately 3 minutes per side, or until golden.</li><li>Repeat with remaining batter.</li></ol>', '456', '18g', '25g', '46g', '15 Min', '3', '0', '1', 'recipe_1519698889.jpg'),
(7, 'Post-workout Shake: Cherry Vanilla', '<p>This delicious, nutrient-packed blend will leave you wanting more.</p>', '<ul><li>1&frac12; tsp all-natural almond butter</li><li>&frac34; cup coconut milk</li><li>&frac12; cup frozen cranberries</li><li>1 cup dark, pitted cherries</li><li>&frac12; scoop vanilla whey protein powder</li><li>&frac12; tbsp chia seeds</li><li>1 tsp pure agave nectar</li><li>1 cup ice</li></ul>', 4, '<ol><li>Add all of the ingredients into a blender and blend on medium-high for 1 minute or until smooth.</li></ol>', '350', '33g', '25g', '15g', '1 Min', '1', '0', '1', 'recipe_1519974269.jpg'),
(8, 'Post-workout Shake: Pumpkin Pie', '<p>Spruce up your boring vanilla, or chocolate post-workout protein shake with this pumpkin pie milkshake.</p>', '<ul><li>&frac14; cup unsweetened almond milk</li><li>&frac12; cup pumpkin</li><li>&frac12; cup organic yogurt</li><li>&frac12; cup vanilla whey protein powder</li><li>1 tsp pure organic honey</li><li>1 tsp graham cracker crumbs</li><li>&frac34; tsp ground cinnamon</li><li>&frac12; tsp ground nutmeg</li><li>1 tsp sugar-free pumpkin instant Jell-O Pudding Mix</li></ul>', 4, '<ol><li>Add all of the ingredients into a blender and blend on medium-high for 1 minute or until smooth.</li></ol>', '200', '18g', '16g', '5g', '1 Min', '1', '1', '1', 'recipe_1519974429.jpg'),
(9, 'Beet Smoothie for Optimal Recovery', '<p>You can&#39;t go wrong with this nutrient-packed healthy beverage.</p>', '<ul><li>1 cooked beet, peeled and quartered</li><li>1 cup frozen blueberries</li><li>1 small frozen banana</li><li>1 cup unsweetened almond milk or other milk of choice</li><li>1 cup coconut water</li><li>1 inch knob fresh ginger, peeled</li><li>1 tbsp almond butter</li></ul>', 4, '<ol><li>Combine all ingredients in blender; blend until smooth.</li></ol>', '197', '15g', '17g', '9g', '1 Min', '1', '0', '1', 'recipe_1519974784.jpg'),
(10, 'The Santina Spritz', '<p>A prosecco and Aperol spritz screams summer, cool down with this low-cal version.</p>', '<ul><li>3 parts Prosecco</li><li>2 parts frozen Aperol</li><li>1 part club soda</li></ul>', 4, '<ol><li>Scoop out frozen Aperol, and place into a pitcher. Pour one bottle of prosecco over the frozen Aperol, and top with soda water. Pour into glasses, and garnish with an orange slice and mint sprig.</li></ol>', '180', '22g', '14g', '7g', '1 Min', '1', '0', '1', 'recipe_1519975136.jpg'),
(11, 'Super-Easy Barbacoa &amp; Jicama Tacos', '<p>Prep these low-carb tacos up to five days in advance for hassle-free eating.</p>', '<ul><li>1 tsp fine sea salt</li><li>&frac12; tsp ground black pepper</li><li>1 tbsp ground cumin</li><li>1 tbsp chipotle chili powder</li><li>1 tbsp dried Mexican oregano leaves</li><li>&frac12; tsp ground cloves</li><li>3 lbs chuck roast, cut into 8 large chunks</li><li>2 tbsp salted butter</li><li>4 garlic cloves, minced</li></ul>', 2, '<ol><li>In a small bowl, mix together the salt, pepper, cumin, chili powder, oregano, and cloves. Dust the pieces of chuck roast with the spice mixture, making sure to coat all sides well.</li><li>Melt the butter in a large frying or saut&eacute; pan over high heat. Add the beef in batches so that the pan isn&rsquo;t overcrowded. Sear the beef for about 3 minutes per side, or until it develops a nice char. Transfer the cooked beef to a slow cooker and repeat with the remaining meat.</li><li>Add the garlic and bay leaves to the beef in the slow cooker. Pour in the vinegar and lime juice. Cover, and cook for 4 hours on high, or until the beef falls apart when tested with a fork.</li><li>Remove and discard the bay leaves. Then, working in the slow cooker, use two forks to shred the beef. Stir it in the accumulated juices.</li><li>To make the jicama tortillas, place the jicama discs in a steamer basket over boiling water and steam for 3 minutes, or place them in a microwave-safe bowl with 2 tbsp water, cover, and microwave on high for 3 minutes. They&rsquo;re finished when they become flexible. Let cool, then drain over paper towels. Top the jicama with the shredded beef and garnish with lime wedges, avocado, and cilantro.</li></ol>', '456', '40g', '16g', '17g', '40 Min', '6', '1', '1', 'recipe_1519975733.jpg'),
(12, 'A nutritious, muscle-building breakfast', '<p>Is breakfast really the most important meal of the day? Some claim breakfast helps jump-start your metabolism, improves cognitive performance, and aids in weight loss; whereas others suggest that it has little effect on weight or may even hinder weight loss. Regardless, many of us aren&rsquo;t ready to ditch our morning meal, and for good reason.</p>', '<ul><li>1 chicken breast (7-9 oz.)</li><li>1 yam</li><li>1 cup peas, corn and carrots</li></ul>', 2, '<ol><li>Add a tall glass of low-fat milk and saute the chicken in extra-virgin olive oil for additional protein and essential fats that help growth.<br />&nbsp;</li></ol>', '603', '50g', '25g', '6g', '30 Min', '4', '0', '1', 'recipe_1519976213.jpg'),
(13, 'Supergreen Candy Salad', '<p>Quinoa, the king of carbs, is a great alternative to typical grains like wheat, oats, and barley. What sets quinoa apart is its amino acid profile, which yields a whopping 24g of complete protein per cup. Quinoa also contains high levels of heart-healthy essential fatty acids, such as ALA and oleic acid.</p>', '<ul><li>2&frac14; oz baby leaf spinach</li><li>2 tsp mint</li><li>2 tsp fresh cilantro</li><li>1 large scallion</li><li>&frac14; red chili</li><li>1 tbsp extra-virgin olive oil</li><li>For the salad:</li><li>&frac34; cup quinoa, uncooked</li><li>3 oz chicken breast</li></ul>', 3, '<ol><li>Place all dressing ingredients in a blender and puree.</li><li>Cook quinoa according to package directions, then drain and cool.</li><li>Slice chicken breast along its length to get a butterflied joint. Season with salt and pepper and cook in an oiled pan over medium heat for 4 minutes on each side.</li><li>Remove from heat and shred chicken.</li><li>In a large bowl, mix dressing with cooked quinoa. Toss vegetables and fruits together and mix; then crumble in feta.&nbsp;</li><li>To serve, divide among four plates and top with shredded chicken.&nbsp;</li></ol>', '545', '35g', '25g', '79g', '15 Min', '5', '0', '1', 'recipe_1519976534.jpg'),
(14, 'Spring Pea Coconut Curry', '<p>Power up, and pack on protein with this nutrient-rich meal.</p>', '<ul><li>1 13.5-oz can coconut milk</li><li>&frac12; cup chicken stock</li><li>2 tsp green curry paste</li><li>1 pint of fresh spring peas or &frac12; bag frozen</li><li>1 Tbsp sugar (brown, cane, or coconut)</li><li>2 Tbsp fish sauce</li><li>&frac12; lb boneless, skinless chicken breast, cubed</li></ul>', 3, '<ol><li>Place coconut milk and chicken stock in a pot, and cook over medium-high heat for about 3 minutes. Whisk in curry paste and add half of the peas, along with sugar and fish sauce; cook another 3 minutes.</li><li>Pour mixture into a blender (or use a handheld blender), and blend until smooth. Return to pot and heat again over medium-high. (Don&rsquo;t boil.)</li><li>Add chicken and remaining peas; stir. Cook 5 minutes or until chicken is just cooked through. Add lime juice, and stir.</li><li>Divide between two bowls. Top with pea shoots and cilantro, and garnish with lime.</li></ol>', '354', '36g', '26g', '65g', '30 Min', '4', '0', '1', 'recipe_1519976739.jpg'),
(15, 'Slow-cooker Stuffed Peppers', '<p>These stuffed peppers are loaded with protein for maximum muscle-building potential.</p>', '<ul><li>1 cup quinoa</li><li>2 cups water</li><li>1 onion, chopped</li><li>5 tsp chili powder</li><li>2 tsp chipotle liquid from canned chipotle peppers</li><li>1 cup canned black beans</li></ul>', 3, '<ol><li>To start, cook the quinoa according to package instructions.</li><li>Saut&eacute; the onion then add the ground beef to pan, and cook until brown.</li><li>Add the chili powder and chipotle liquid to the pan, then add in the black beans, tomato paste, and three-fourths cup of the crushed tomatoes. Once the sauce thickens, stir in the quinoa.</li></ol>', '435', '46g', '23g', '18g', '15 Min', '3', '0', '1', 'recipe_1519976893.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `equipments`
--

CREATE TABLE `equipments` (
  `equipment_id` int(11) NOT NULL,
  `equipment_title` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `equipment_image` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `equipments`
--

INSERT INTO `equipments` (`equipment_id`, `equipment_title`, `equipment_image`) VALUES
(1, 'Dumbbells', 'equipment_1517248382.png'),
(2, 'Barbell', 'equipment_1517248454.png'),
(3, 'Kettlebells', 'equipment_1517248460.png'),
(4, 'No Equipment', 'equipment_1517248680.png'),
(5, 'Pull-up Bar', 'equipment_1517248764.png'),
(6, 'Medicine Ball', 'equipment_1519940384.png'),
(7, 'Dip Station', 'equipment_1519940384.png'),
(8, 'Cable machine', 'equipment_1519940384.png'),
(9, 'Leg press machine', 'equipment_1519940384.png'),
(10, 'Hyperextension bench', 'equipment_1519940384.png'),
(11, 'Body weight', 'equipment_1519940384.png'),
(12, 'Lat Pulldown Machine', 'equipment_1519940384.png'),
(13, 'Bench', 'equipment_1519940384.png'),
(14, 'Lying Leg Curl Machine', 'equipment_1519940384.png'),
(15, 'Leg Extension Machine', 'equipment_1519940384.png'),
(16, 'Barbell Rack', 'equipment_1519940384.png');

-- --------------------------------------------------------

--
-- Table structure for table `exercises`
--

CREATE TABLE `exercises` (
  `exercise_id` int(11) NOT NULL,
  `exercise_title` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `exercise_reps` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `exercise_sets` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `exercise_rest` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `exercise_equipment` int(11) NOT NULL,
  `exercise_level` int(11) NOT NULL,
  `exercise_image` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `exercise_video` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `exercise_tips` text NOT NULL,
  `exercise_instructions` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `exercises`
--

INSERT INTO `exercises` (`exercise_id`, `exercise_title`, `exercise_reps`, `exercise_sets`, `exercise_rest`, `exercise_equipment`, `exercise_level`, `exercise_image`, `exercise_video`, `exercise_tips`, `exercise_instructions`) VALUES
(1, 'Bodyweight Squats', '12', '4', '1 Min', 11, 2, 'exercise_1519942162.jpg', 'bodyweight_squats.mp4', '<ul><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ul>', '<ol><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ol>'),
(2, 'Pushups', '12', '4', '1 Min', 11, 2, 'exercise_1519942162.jpg', 'pushups.mp4', '<ul><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ul>', '<ol><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ol>'),
(3, 'Plank', '12', '4', '1 Min', 11, 2, 'exercise_1519942162.jpg', 'plank.mp4', '<ul><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ul>', '<ol><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ol>'),
(4, 'Dumbbell Calf Raises', '12', '4', '1 Min', 6, 2, 'exercise_1519942162.jpg', 'dumbbell_calf_raises.mp4', '<ul><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ul>', '<ol><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ol>'),
(5, 'Dumbbell Lunges', '12', '4', '1 Min', 1, 2, 'exercise_1519942162.jpg', 'dumbbell_lunges.mp4', '<ul><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ul>', '<ol><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ol>'),
(6, 'Russian Twists', '10', '4', '1 Min', 11, 2, 'exercise_1519942162.jpg', 'russian_twists.mp4', '<ul><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ul>', '<ol><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ol>'),
(8, 'Cable Wood Chop', '12', '4', '1 Min', 8, 2, 'exercise_1519942162.jpg', 'cable_wood_chop.mp4', '<ul><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ul>', '<ol><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ol>'),
(9, 'Dumbbell Shoulder Press', '12', '4', '1 Min', 1, 2, 'exercise_1519942162.jpg', 'dumbbell_shoulder_press.mp4', '<ul><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ul>', '<ol><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ol>'),
(10, 'Dumbbell Curls', '12', '4', '1 Min', 1, 2, 'exercise_1519942162.jpg', 'dumbbell_curls.mp4', '<ul><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ul>', '<ol><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ol>'),
(15, 'Box step-ups', '12', '4', '1 Min', 6, 2, 'exercise_1519942162.jpg', 'https://yourvideolink.com/', '<ul><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ul>', '<ol><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ol>'),
(16, 'Jump rope', '12', '4', '1 Min', 6, 2, 'exercise_1519942162.jpg', 'jump_rope.mp4', '<ul><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ul>', '<ol><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ol>'),
(17, 'High knees', '12', '4', '1 Min', 4, 2, 'exercise_1519942162.jpg', 'high_knees.mp4', '<ul><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ul>', '<ol><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ol>'),
(18, 'Jumping jacks', '12', '4', '1 Min', 4, 2, 'exercise_1519942162.jpg', 'jumping_jacks.mp4', '<ul><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ul>', '<ol><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ol>'),
(19, 'Dumbbell Fly', '12', '4', '1 Min', 1, 2, 'exercise_1519942162.jpg', 'dumbbell_fly.mp4', '<ul><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ul>', '<ol><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ol>'),
(20, 'Barbell Squat', '12', '4', '1 Min', 2, 2, 'exercise_1519942162.jpg', 'barbell_squat.mp4', '<ul><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ul>', '<ol><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ol>'),
(22, 'Leg Press', '12', '4', '1 Min', 9, 2, 'exercise_1519942162.jpg', 'leg_press.mp4', '<ul><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ul>', '<ol><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ol>'),
(23, 'Burpees', '12', '4', '1 Min', 6, 2, 'exercise_1519942162.jpg', 'burpees.mp4', '<ul><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ul>', '<ol><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ol>'),
(24, 'Box jumps', '12', '4', '1 Min', 6, 2, 'exercise_1519942162.jpg', 'box_jumps.mp4', '<ul><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ul>', '<ol><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ol>'),
(25, 'Jumping lunges', '12', '4', '1 Min', 4, 2, 'exercise_1519942162.jpg', 'jumping_lunges.mp4', '', '<ol><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ol>'),
(26, 'Barbell Deadlift', '12', '4', '1 Min', 2, 2, 'exercise_1519942162.jpg', 'barbell_deadlift.mp4', '<ul><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ul>', '<ol><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ol>'),
(28, 'Single leg Deadlifts', '12', '4', '1 Min', 1, 2, 'exercise_1519942162.jpg', 'single_leg_deadlifts.mp4', '<ul><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ul>', '<ol><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ol>'),
(29, 'Glute Bridge', '12', '4', '1 Min', 4, 2, 'exercise_1519942162.jpg', 'glute_bridge.mp4', '<ul><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ul>', ''),
(32, 'Chest Dips', '12', '4', '1 Min', 7, 2, 'exercise_1519942162.jpg', 'chest_dips.mp4', '<ul><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ul>', '<ol><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ol>'),
(34, 'Lying Leg Curls', '12', '4', '1 Min', 6, 2, 'exercise_1519942162.jpg', 'lying_leg_curls.mp4', '<ul><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ul>', '<ol><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ol>'),
(36, 'Barbell Bench Press', '12', '4', '1 Min', 2, 2, 'exercise_1519942162.jpg', 'barbell_bench_press.mp4', '<ul><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ul>', '<ol><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ol>'),
(37, 'Barbell Curl', '12', '4', '1 Min', 2, 2, 'exercise_1519942162.jpg', 'barbell_curl.mp4', '<ul><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ul>', '<ol><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ol>'),
(39, 'Hyperextensions', '12', '4', '1 Min', 10, 2, 'exercise_1519942162.jpg', 'hyperextensions.mp4', '<ul><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ul>', '<ol><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ol>'),
(40, 'Sit-ups', '12', '4', '1 Min', 11, 2, 'exercise_1519942162.jpg', 'sit-ups.mp4', '<ul><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ul>', '<ol><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ol>'),
(41, 'Standing Barbell Military Press', '12', '4', '1 Min', 2, 2, 'exercise_1519942162.jpg', 'standing_barbell_military_press.mp4', '<ul><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ul>', '<ol><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ol>'),
(42, 'Leg extensions', '12', '4', '1 Min', 4, 2, 'exercise_1519942162.jpg', 'leg_extensions.mp4', '<ul><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ul>', '<ol><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ol>'),
(43, 'Lying leg raises', '12', '4', '1 Min', 4, 2, 'exercise_1519942162.jpg', 'lying_leg_raises.mp4', '<ul><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ul>', '<ol><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ol>'),
(44, 'Lat Pulldown', '12', '4', '1 Min', 4, 2, 'exercise_1519942162.jpg', 'lat_pulldown.mp4', '<ul><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ul>', '<ol><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ol>'),
(45, 'Triceps Press Down', '12', '4', '1 Min', 8, 2, 'exercise_1519942162.jpg', 'triceps_press_down.mp4', '<ul><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ul>', '<ol><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ol>'),
(46, 'Treadmill', '12', '4', '1 Min', 6, 2, 'exercise_1519942162.jpg', 'treadmill.mp4', '<ul><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ul>', '<ol><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ol>'),
(48, 'Rowing machine', '12', '4', '1 Min', 6, 2, 'exercise_1519942162.jpg', 'rowing_machine.mp4', '<ul><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ul>', '<ol><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ol>'),
(49, 'Barbell Row', '12', '4', '1 Min', 2, 2, 'exercise_1519942162.jpg', 'barbell_row.mp4', '<ul><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ul>', '<ol><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ol>'),
(51, 'Chin Ups - Pull Ups', '12', '4', '1 Min', 5, 5, 'exercise_1519942162.jpg', 'chin_ups_-_pull_ups.mp4', '<ul><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ul>', '<ol><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ol>'),
(52, 'Dumbbell Bench Press', '12', '4', '1 Min', 1, 5, 'exercise_1519942162.jpg', 'dumbbell_bench_press.mp4', '<ul><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ul>', '<ol><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ol>'),
(57, 'Dumbbell Tricep extensions', '10', '4', '30 sec', 4, 5, 'exercise_1519942162.jpg', 'dumbbell_tricep_extensions.mp4', '<ul><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ul>', '<ol><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ol>'),
(59, 'Dumbbell front raise', '10', '4', '30 sec', 4, 5, 'exercise_1519942162.jpg', 'dumbbell_front_raise.mp4', '', '<ol><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ol>'),
(60, 'Dumbbell lateral raise', '10', '4', '30 sec', 4, 5, 'exercise_1519942162.jpg', 'dumbbell_lateral_raise.mp4', '<ul><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ul>', '<ol><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ol>'),
(61, 'Dumbbell rows', '10', '4', '30 sec', 4, 5, 'exercise_1519942162.jpg', 'dumbbell_rows.mp4', '<ul><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ul>', '<ol><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ol>'),
(63, 'Close grip pullup', '10', '4', '30 sec', 4, 5, 'exercise_1519942162.jpg', 'close_grip_pullup.mp4', '<ul><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ul>', '<ol><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ol>'),
(75, 'Cool down', '10', '4', '30 sec', 4, 5, 'exercise_1519942162.jpg', 'cool_down.mp4', '<ul><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ul>', '<ol><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ol>'),
(77, 'Handstand push-ups', '10', '4', '30 sec', 11, 5, 'exercise_1519942162.jpg', 'handstand_push-ups.mp4', '<ul><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ul>', '<ol><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ol>'),
(78, 'Inverted row', '10', '4', '30 sec', 4, 5, 'exercise_1519942162.jpg', 'inverted_row.mp4', '<ul><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ul>', '<ol><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ol>'),
(79, 'Mountain climbers', '10', '4', '30 sec', 11, 5, 'exercise_1519942162.jpg', 'mountain_climbers.mp4', '<ul><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ul>', '<ol><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li></ol>');

-- --------------------------------------------------------

--
-- Table structure for table `exercises_bodyparts`
--

CREATE TABLE `exercises_bodyparts` (
  `bodypart_id` int(11) NOT NULL,
  `exercise_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `exercises_bodyparts`
--

INSERT INTO `exercises_bodyparts` (`bodypart_id`, `exercise_id`) VALUES
(2, 45),
(8, 45),
(14, 45),
(3, 36),
(4, 36),
(11, 36),
(1, 37),
(8, 26),
(2, 26),
(14, 26),
(7, 26),
(7, 49),
(1, 49),
(8, 20),
(2, 20),
(14, 20),
(7, 20),
(8, 1),
(2, 1),
(14, 1),
(7, 1),
(8, 24),
(2, 24),
(14, 24),
(12, 24),
(8, 23),
(2, 23),
(14, 23),
(11, 23),
(9, 8),
(5, 8),
(7, 8),
(3, 32),
(4, 32),
(7, 57),
(1, 57),
(7, 63),
(1, 63),
(3, 10),
(4, 10),
(11, 10),
(1, 10),
(3, 19),
(11, 59),
(11, 10),
(10, 4),
(11, 9),
(4, 9),
(4, 57),
(3, 77),
(4, 77),
(11, 77),
(7, 39),
(7, 78),
(1, 78),
(7, 44),
(1, 44),
(2, 42),
(14, 22),
(2, 22),
(8, 22),
(14, 34),
(5, 43),
(3, 79),
(4, 79),
(11, 79),
(13, 79),
(5, 3),
(7, 3),
(7, 51),
(1, 51),
(3, 2),
(4, 2),
(11, 2),
(9, 6),
(5, 40),
(11, 41),
(4, 41),
(4, 45);

-- --------------------------------------------------------

--
-- Table structure for table `goals`
--

CREATE TABLE `goals` (
  `goal_id` int(11) NOT NULL,
  `goal_title` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `goal_image` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `goals`
--

INSERT INTO `goals` (`goal_id`, `goal_title`, `goal_image`) VALUES
(1, 'Transform', 'goal_1516827143.jpg'),
(2, 'Strength', 'goal_1517335949.jpg'),
(3, 'upper body', 'goal_1517335949.jpg'),
(4, 'lower body', 'goal_1517335949.jpg'),
(5, 'Core strength', 'goal_1517335949.jpg'),
(6, 'Cardiovascular', 'goal_1517335949.jpg'),
(7, 'General', 'goal_1517335949.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `level_id` int(11) NOT NULL,
  `level_title` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `level_description` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `level_image` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`level_id`, `level_title`, `level_description`, `level_image`) VALUES
(1, 'Beginner', '', 'level_1516827206.jpg'),
(2, 'Intermediate', '', 'level_1516827220.jpg'),
(3, 'Advanced', '', 'level_1516827226.jpg'),
(4, 'Elite', '', 'level_1517336508.jpg'),
(5, 'General', '', 'level_1517336508.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `managers`
--

CREATE TABLE `managers` (
  `id` int(11) NOT NULL,
  `password` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `managers`
--

INSERT INTO `managers` (`id`, `password`, `username`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `offer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_txn` varchar(255) NOT NULL,
  `order_gross` float(10,2) NOT NULL,
  `order_cc` varchar(5) NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `order_platform` varchar(50) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `post_description` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `post_tag` int(11) NOT NULL,
  `post_featured` varchar(11) NOT NULL,
  `post_date` datetime NOT NULL DEFAULT current_timestamp(),
  `post_image` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `post_status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_title`, `post_description`, `post_tag`, `post_featured`, `post_date`, `post_image`, `post_status`) VALUES
(1, '\'AJ\' Gets Ready in the Gym', '<p><a href=\"https://www.google.com\">Anthony Joshua&rsquo;s</a> Herculean physique has been a major factor on his way to a 20-0 record&mdash;and thanks to his many Instagram workout clips, we can all get a glimpse at how he packs on the muscle.</p><p>Joshua&#39;s penultimate fight was originally set for a rematch before Wladimir Klitschko retired, which forced Joshua to fight Kubrat Pulev to keep his belt.Just recently, his opponent changed again.</p><p>The fight&#39;s promoters announced that Pulev sustained a shoulder injury and stepped down from the fight. Joshua&#39;s mandatory opponent will be Carlos Takam, whom he beat back in October.</p>', 2, '1', '2018-02-09 22:22:49', 'post_1518211526.jpg', '0'),
(2, '\'The Rock\' Reflects On His Mom\'s Suicide Attempt', '<p>Whether it&#39;s a movie or television show, when Dwayne &quot;The Rock&quot; Johnson appears on the screen hilarity or action-packed ass kickings typically ensue. On rare occasions, however, you&#39;ll find a somber moment during which one of the world&#39;s most intimidating, yet kind-hearted men lets down his guard to expose a softer side.</p><p>A rare sighting of that sort recently took place on the set of HBO&#39;s hit show Ballers when a scene called for Johnson&#39;s character to visit his brother&#39;s grave site.</p><p>While he admitted that it was a tough scene to shoot, the action star saw the experience as a reminder to be aware of others close to us who may be having a difficult time in life. &quot;Help &lsquo;em thru it, get &lsquo;em talkin&rsquo; about the struggle and remind &lsquo;em that they&rsquo;re not alone,&quot; he wrote.</p><p>Johnson&#39;s mother survived that traumatizing event, but the haunting memory will always be with him. Sharing this personal story may have been difficult for a guy more comfortable talking about his battle with the iron, but it certainly will help to shed more light on a sensitive subject that deserves our attention.&nbsp;</p><p>&nbsp;</p>', 2, '1', '2018-02-09 22:28:18', 'post_1518211699.jpg', '1'),
(3, 'Goldberg Looks Massively Ripped on \'The Flash\'', '<p>Legendary wrestler Bill Goldberg is having a great month.</p><p>On top of finding out that he&rsquo;ll be inducted into the WWE Hall of Fame as part of the Class of 2018, Goldberg also will appear on the CW series The Flash.</p><p>The first photos from the episode have trickled out, showing a ripped Goldberg alongside Barry Allen (Grant Gustin) while locked up in jail. Goldberg filmed scenes for two episodes, posting on Instagram that he had a &ldquo;great experience&rdquo; with Gustin, calling the actor &ldquo;a true scholar and gentleman!&rdquo;</p>', 2, '1', '2018-02-09 22:30:35', 'post_1518211836.jpg', '1'),
(4, '5 Biggest Mistakes To Avoid In 2018', '<p>Hey guys, it&#39;s February and, hopefully, a lot of people are still working hard on their New Year&#39;s resolutions. I won&#39;t lie to you&mdash;I don&#39;t believe in these kinds of resolutions. I just don&#39;t. Don&#39;t get me wrong, I&#39;m all about people deciding to make positive changes in their lives. I&#39;m all for people deciding to live healthier lives. But New Year&#39;s resolutions fail most of the time. That&#39;s probably why people keep making the same ones year after year.</p><p>I want you to set realistic goals&mdash;and them reach them. I want you to live a better, healthier life. So, I put together a list of mistakes that hundreds of thousands of people make every year. Avoid them, and the next time you set goals you won&#39;t have to set them again; next time, or maybe this time, you&#39;ll make them happen!</p><ol><li>Don&#39;t Set Unrealistic Goals</li><li>Don&#39;t Kid Yourself That Exercise Will Solve Everything</li><li>Don&#39;t Forget To Set Up Goals And Rewards</li><li>Don&#39;t Fall For Fad Diets</li><li>Don&#39;t Forget The Basics</li></ol>', 1, '1', '2018-02-10 20:16:16', 'post_1518290177.jpg', '1'),
(5, 'Sly Stallone on Death Rumors: \'Ignore This Stupidity\'', '<p>Every celebrity ends up on the receiving end of some death rumors. Celeb death rumors are so plentiful, in fact, that for the most part actors and musicians don&#39;t even bother to respond. But Sylvester Stallone, known for his role as the iconic Rocky Balboa in the Rocky franchise and his enduring status as one of Hollywood&#39;s top action heroes, isn&#39;t the type of guy to let that sort of thing slide.</p><p>So when rumors began to circulate that he&#39;d succumbed to prostate cancer following a secret battle with the disease, he took to Instagram to let fans know that he&#39;s alive&mdash;and punching, of course.</p><p>&quot;Please ignore this stupidity,&quot; Stallone captioned a screenshot of one fan&#39;s memorial post on Facebook. &quot;Alive and well and happy and healthy...Still punching!&quot; The photo has been liked over 420,000 times since Stallone posted it on his Instagram account on Monday.</p><p>If you need more proof that Sly&#39;s alive and well, you need look no further than his last few Instagram posts. When he&#39;s not sharing fan photos ahead of the much-anticipated Rocky spinoff Creed II, he&#39;s hitting the gym hard.</p>', 2, '1', '2018-02-25 05:54:49', 'post_1519534490.jpg', '1'),
(6, 'Jason Statham to Play Assassin in ‘Killer\'s Game\': Report', '<p>Jason Statham is starting to challenge Dwayne &ldquo;The Rock&rdquo; Johnson as the busiest man in Hollywood.</p><p>With his mega-monster shark film The Meg coming up in August and a Hobbs and Shaw spinoff with Johnson on the horizon, Statham just keeps on adding projects.&nbsp;</p><p>Statham already is set to return for the sequel Spy 2 with Melissa McCarthy. He&#39;s developing a Hong Kong action thriller with STX Entertainment. Now, he has another badass role on the horizon: veteran hitman.</p><p>Statham is circling the lead role in The Killer&rsquo;s Game, with xXx: The Return of Xander Cage director D.J. Caruso behind the camera, according to an exclusive in The Hollywood Reporter.</p><p>The film is based on Jay Bonansinga&rsquo;s novel, and follows &ldquo;a veteran assassin who is diagnosed with a life-threatening illness and takes a hit out on himself to avoid the pain that is destined to follow. After ordering the kill, he finds out that he was misdiagnosed&mdash;and must then fend off the army of former colleagues trying to kill him.&rdquo;</p><p>The script has been floating around Hollywood for years, with stars like Michael Keaton and Wesley Snipes having been attached to it in the past.</p><p>Assassins trying to kill another assassin gives the story some undeniable John Wick vibes, which should make Killer&#39;s Game an action-fest with Statham smack-dab in the middle of it.&nbsp;</p><p>The Meg is set for release on August 10, 2018.</p>', 2, '0', '2018-02-25 05:56:19', 'post_1519534580.jpg', '1'),
(7, 'What to Do If Working Out Is Killing Your Knees', '<p>Knee pain is a common exercise complaint. The knee is an intricate joint, involving bones, menisci, muscles, tendons, and ligaments all supporting the joint. If there is damage or stress to any of these components, you may have achy knees.</p><p>Plus, many physical activities&mdash;running, jumping, stretching, bending&mdash;can put a lot of strain, impact, or body weight directly on the knees, and in turn, cause pain while you work out. This is common among weekend warriors who work out intensely but inconsistently.</p><p>You can also develop tendonitis over time if you&rsquo;re regularly doing these motions.</p>', 3, '1', '2018-03-02 09:01:29', 'post_1519977690.jpg', '1'),
(8, 'Even Light Exercise Can Help You Live Longer', '<p>A new study shows that small bouts of light physical activity are enough to increase lifespan in older men.</p><p>Government guidelines recommended that adults get at least 2 hours and 30 minutes of moderate-intensity exercise every week. However, only about half of American adults actually meet those recommendations, and for older adults, they may seem hard to achieve. But a new report published in the British Journal of Sports Medicine suggests that there&rsquo;s a way to tweak guidelines to make them more feasible for older people, while still maintaining health.</p><p>In the report, researchers looked at about 1,180 men &mdash; average age, 78 &mdash; who agreed to wear devices that measured their movements for seven days. They were followed for about five years. The researchers found that the overall volume of exercise, not necessarily how long or how hard someone exercised in a session, mattered most for longevity.</p>', 4, '0', '2018-03-02 09:03:50', 'post_1519977831.jpg', '1'),
(9, '5 Ways to Torch Your Core in Every Workout', '<p>At the core of every movement is just that: your core. And while lots of times &ldquo;core&rdquo; and &ldquo;abs&rdquo; become synonymous, it&rsquo;s not 100% correct to use them interchangeably. Your rectus abdominus, transverse abdominus and obliques do comprise your midsection, but those aren&rsquo;t the only muscles involved. Your back, hips and glutes also provide that stable base you need for stepping forward and backward, jumping side-to-side or turning all about. So to get a serious core workout you need to work them all.</p><p>&ldquo;Core strength and stability not only enhances physical and athletic performance, but also helps maintain and correct posture and form, and prevent injury,&rdquo; says Andia Winslow, a Daily Burn Audio Workouts trainer. &ldquo;Those who have an awareness of their core and ability to engage it properly also have enhanced proprioception &mdash; or a sense of the positions of their extremities, without actually seeing them.&rdquo;</p>', 4, '0', '2018-03-02 09:06:25', 'post_1519977985.jpg', '1');

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--

CREATE TABLE `quotes` (
  `quote_id` int(11) NOT NULL,
  `quote_title` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `quotes`
--

INSERT INTO `quotes` (`quote_id`, `quote_title`) VALUES
(1, 'Pain is weakness leaving the body'),
(2, 'Being defeated is often a temporary condition. Giving up is what makes it permanent'),
(3, 'Failure is only a temporary change in direction to set you straight for your next success'),
(4, 'The worst thing you can be is average'),
(5, 'When it starts to hurt, thats when the set starts'),
(6, 'To achieve something you’ve never had before, you must do something you’ve never done before'),
(7, 'You don’t demand respect, you earn it'),
(8, 'Expecting the world to treat you fairly because you’re an honest person is like expecting the bull not to charge you because you’re a vegetarian'),
(9, 'Be proud, but never satisfied'),
(10, 'Obsession is what lazy people call dedication'),
(11, 'The best way to predict your future is to create it');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `site_name` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `email_password` varchar(255) NOT NULL,
  `email_name` varchar(255) NOT NULL,
  `smtp_host` varchar(255) NOT NULL,
  `smtp_port` varchar(255) NOT NULL,
  `smtp_encrypt` varchar(255) NOT NULL,
  `paypal_email` varchar(255) NOT NULL,
  `paypal_currency` varchar(255) NOT NULL,
  `paypal_url` varchar(255) NOT NULL,
  `paypal_cancel_url` varchar(255) NOT NULL,
  `paypal_success_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`site_name`, `email_address`, `email_password`, `email_name`, `smtp_host`, `smtp_port`, `smtp_encrypt`, `paypal_email`, `paypal_currency`, `paypal_url`, `paypal_cancel_url`, `paypal_success_url`) VALUES
('Encanto', 'info@example.com', '123456789', 'Encanto Notification', 'your.host.com', '587', 'tls', 'example@hotmail.com', 'USD', 'https://www.sandbox.paypal.com/cgi-bin/webscr', 'https://example.com/payment/paypal/cancel.php', 'https://example.com/payment/paypal/success.php');

-- --------------------------------------------------------

--
-- Table structure for table `strings`
--

CREATE TABLE `strings` (
  `st_aboutus` text NOT NULL,
  `st_privacypolicy` text NOT NULL,
  `st_termsofservice` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `strings`
--

INSERT INTO `strings` (`st_aboutus`, `st_privacypolicy`, `st_termsofservice`) VALUES
('<p><strong>About Us</strong></p><p><em>What is Lorem Ipsum?</em></p><p>Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p><em>Why do we use it?</em></p><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '<p><strong>Privacy Policy</strong></p><p><em>What is Lorem Ipsum?</em></p><p>Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p><em>Why do we use it?</em></p><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '<p><strong>Terms of Service</strong></p><p><em>What is Lorem Ipsum?</em></p><p>Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p><em>Why do we use it?</em></p><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `tag_id` int(11) NOT NULL,
  `tag_title` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`tag_id`, `tag_title`) VALUES
(1, 'Motivation'),
(2, 'News'),
(3, 'Fitness'),
(4, 'Tips');

-- --------------------------------------------------------

--
-- Table structure for table `we_day1`
--

CREATE TABLE `we_day1` (
  `exercise_id` int(11) NOT NULL,
  `workout_id` int(11) NOT NULL,
  `day_1` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `we_day1`
--

INSERT INTO `we_day1` (`exercise_id`, `workout_id`, `day_1`) VALUES
(1, 1, 1),
(5, 1, 1),
(4, 1, 1),
(3, 1, 1),
(1, 2, 1),
(5, 2, 1),
(4, 2, 1),
(3, 2, 1),
(2, 3, 1),
(19, 3, 1),
(10, 3, 1),
(9, 3, 1),
(3, 4, 1),
(6, 4, 1),
(6, 4, 1),
(29, 4, 1),
(46, 5, 1),
(18, 5, 1),
(17, 5, 1),
(16, 5, 1),
(20, 6, 1),
(45, 6, 1),
(5, 6, 1),
(22, 6, 1),
(34, 6, 1),
(20, 7, 1),
(45, 7, 1),
(5, 7, 1),
(22, 7, 1),
(34, 7, 1),
(20, 8, 1),
(25, 8, 1),
(24, 8, 1),
(23, 8, 1),
(26, 9, 1),
(5, 9, 1),
(29, 9, 1),
(28, 9, 1),
(20, 10, 1),
(5, 10, 1),
(22, 10, 1),
(34, 10, 1),
(57, 10, 1),
(20, 11, 1),
(26, 11, 1),
(5, 11, 1),
(28, 11, 1),
(20, 12, 1),
(26, 12, 1),
(5, 12, 1),
(28, 12, 1),
(51, 13, 1),
(36, 13, 1),
(37, 13, 1),
(49, 13, 1),
(52, 13, 1),
(3, 14, 1),
(6, 14, 1),
(39, 14, 1),
(44, 14, 1),
(41, 14, 1),
(16, 15, 1),
(24, 15, 1),
(23, 15, 1),
(17, 15, 1),
(18, 15, 1),
(20, 16, 1),
(26, 16, 1),
(5, 16, 1),
(29, 16, 1),
(28, 16, 1),
(34, 16, 1),
(20, 17, 1),
(26, 17, 1),
(5, 17, 1),
(28, 17, 1),
(34, 17, 1),
(22, 17, 1),
(42, 17, 1),
(51, 18, 1),
(36, 18, 1),
(37, 18, 1),
(49, 18, 1),
(52, 18, 1),
(10, 18, 1),
(9, 18, 1),
(8, 18, 1),
(3, 19, 1),
(6, 19, 1),
(39, 19, 1),
(44, 19, 1),
(41, 19, 1),
(41, 19, 1),
(43, 19, 1),
(3, 20, 1),
(6, 20, 1),
(39, 20, 1),
(44, 20, 1),
(41, 20, 1),
(41, 20, 1),
(43, 20, 1),
(20, 21, 1),
(52, 21, 1),
(51, 21, 1),
(45, 21, 1),
(20, 22, 1),
(52, 22, 1),
(5, 22, 1),
(26, 22, 1),
(20, 23, 1),
(9, 23, 1),
(37, 23, 1),
(26, 23, 1),
(20, 24, 1),
(9, 24, 1),
(51, 24, 1),
(45, 24, 1),
(20, 25, 1),
(9, 25, 1),
(37, 25, 1),
(26, 25, 1),
(20, 26, 1),
(52, 26, 1),
(51, 26, 1),
(45, 26, 1),
(20, 27, 1),
(52, 27, 1),
(5, 27, 1),
(26, 27, 1),
(51, 27, 1),
(20, 28, 1),
(9, 28, 1),
(37, 28, 1),
(26, 28, 1),
(51, 28, 1),
(20, 29, 1),
(51, 29, 1),
(5, 29, 1),
(37, 29, 1),
(20, 30, 1),
(37, 30, 1),
(5, 30, 1),
(51, 30, 1),
(51, 31, 1),
(49, 31, 1),
(10, 31, 1),
(57, 31, 1),
(10, 32, 1),
(57, 32, 1),
(10, 32, 1),
(37, 32, 1),
(59, 32, 1),
(51, 33, 1),
(19, 33, 1),
(32, 33, 1),
(52, 33, 1),
(59, 33, 1),
(51, 34, 1),
(49, 34, 1),
(9, 34, 1),
(57, 34, 1),
(36, 34, 1),
(51, 35, 1),
(49, 35, 1),
(61, 35, 1),
(19, 35, 1),
(32, 35, 1),
(20, 36, 1),
(5, 36, 1),
(22, 36, 1),
(4, 36, 1),
(26, 37, 1),
(1, 37, 1),
(45, 37, 1),
(34, 37, 1),
(20, 38, 1),
(26, 38, 1),
(29, 38, 1),
(41, 38, 1),
(20, 39, 1),
(26, 39, 1),
(49, 39, 1),
(41, 39, 1),
(20, 40, 1),
(5, 40, 1),
(22, 40, 1),
(4, 40, 1),
(40, 41, 1),
(3, 41, 1),
(6, 41, 1),
(43, 41, 1),
(37, 42, 1),
(51, 42, 1),
(19, 42, 1),
(32, 42, 1),
(3, 43, 1),
(3, 43, 1),
(3, 43, 1),
(3, 43, 1),
(8, 44, 1),
(6, 44, 1),
(75, 44, 1),
(39, 44, 1),
(40, 45, 1),
(6, 45, 1),
(43, 45, 1),
(6, 45, 1);

-- --------------------------------------------------------

--
-- Table structure for table `we_day2`
--

CREATE TABLE `we_day2` (
  `exercise_id` int(11) NOT NULL,
  `workout_id` int(11) NOT NULL,
  `day_2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `we_day2`
--

INSERT INTO `we_day2` (`exercise_id`, `workout_id`, `day_2`) VALUES
(2, 1, 2),
(1, 1, 2),
(5, 1, 2),
(4, 1, 2),
(6, 2, 2),
(1, 2, 2),
(5, 2, 2),
(4, 2, 2),
(8, 3, 2),
(2, 3, 2),
(19, 3, 2),
(10, 3, 2),
(6, 4, 2),
(3, 4, 2),
(6, 4, 2),
(6, 4, 2),
(15, 5, 2),
(46, 5, 2),
(18, 5, 2),
(17, 5, 2),
(57, 6, 2),
(4, 6, 2),
(20, 6, 2),
(45, 6, 2),
(51, 6, 2),
(57, 7, 2),
(4, 7, 2),
(20, 7, 2),
(45, 7, 2),
(5, 7, 2),
(16, 8, 2),
(25, 8, 2),
(24, 8, 2),
(23, 8, 2),
(26, 9, 2),
(5, 9, 2),
(29, 9, 2),
(28, 9, 2),
(4, 10, 2),
(3, 10, 2),
(6, 10, 2),
(20, 10, 2),
(5, 10, 2),
(20, 11, 2),
(26, 11, 2),
(5, 11, 2),
(28, 11, 2),
(34, 12, 2),
(22, 12, 2),
(42, 12, 2),
(20, 12, 2),
(10, 13, 2),
(9, 13, 2),
(8, 13, 2),
(45, 13, 2),
(51, 13, 2),
(41, 14, 2),
(43, 14, 2),
(40, 14, 2),
(3, 14, 2),
(6, 14, 2),
(46, 15, 2),
(16, 15, 2),
(24, 15, 2),
(23, 15, 2),
(17, 15, 2),
(22, 16, 2),
(42, 16, 2),
(5, 16, 2),
(20, 16, 2),
(26, 16, 2),
(5, 16, 2),
(5, 17, 2),
(20, 17, 2),
(26, 17, 2),
(5, 17, 2),
(28, 17, 2),
(34, 17, 2),
(22, 17, 2),
(45, 18, 2),
(19, 18, 2),
(51, 18, 2),
(36, 18, 2),
(37, 18, 2),
(49, 18, 2),
(52, 18, 2),
(10, 18, 2),
(40, 19, 2),
(32, 19, 2),
(3, 19, 2),
(6, 19, 2),
(39, 19, 2),
(44, 19, 2),
(41, 19, 2),
(46, 20, 2),
(48, 20, 2),
(16, 20, 2),
(24, 20, 2),
(23, 20, 2),
(17, 20, 2),
(18, 20, 2),
(5, 21, 2),
(52, 21, 2),
(51, 21, 2),
(45, 21, 2),
(51, 22, 2),
(45, 22, 2),
(49, 22, 2),
(9, 22, 2),
(20, 23, 2),
(9, 23, 2),
(37, 23, 2),
(26, 23, 2),
(5, 24, 2),
(26, 24, 2),
(37, 24, 2),
(52, 24, 2),
(5, 25, 2),
(52, 25, 2),
(51, 25, 2),
(45, 25, 2),
(37, 26, 2),
(26, 26, 2),
(5, 26, 2),
(9, 26, 2),
(45, 27, 2),
(49, 27, 2),
(9, 27, 2),
(37, 27, 2),
(19, 27, 2),
(52, 28, 2),
(5, 28, 2),
(45, 28, 2),
(49, 28, 2),
(19, 28, 2),
(49, 29, 2),
(9, 29, 2),
(45, 29, 2),
(26, 29, 2),
(49, 30, 2),
(37, 30, 2),
(5, 30, 2),
(51, 30, 2),
(9, 31, 2),
(36, 31, 2),
(51, 31, 2),
(49, 31, 2),
(57, 31, 2),
(60, 32, 2),
(9, 32, 2),
(10, 32, 2),
(57, 32, 2),
(10, 32, 2),
(60, 33, 2),
(45, 33, 2),
(63, 33, 2),
(4, 33, 2),
(2, 33, 2),
(59, 34, 2),
(60, 34, 2),
(6, 34, 2),
(41, 34, 2),
(61, 34, 2),
(52, 35, 2),
(8, 35, 2),
(26, 35, 2),
(46, 35, 2),
(49, 35, 2),
(39, 36, 2),
(4, 36, 2),
(3, 36, 2),
(20, 36, 2),
(29, 37, 2),
(42, 37, 2),
(43, 37, 2),
(26, 37, 2),
(9, 38, 2),
(59, 38, 2),
(60, 38, 2),
(20, 38, 2),
(8, 39, 2),
(63, 39, 2),
(45, 39, 2),
(20, 39, 2),
(9, 40, 2),
(59, 40, 2),
(60, 40, 2),
(20, 40, 2),
(75, 41, 2),
(48, 41, 2),
(39, 41, 2),
(40, 41, 2),
(44, 42, 2),
(57, 42, 2),
(2, 42, 2),
(37, 42, 2),
(3, 43, 2),
(3, 43, 2),
(3, 43, 2),
(3, 43, 2),
(48, 44, 2),
(43, 44, 2),
(40, 44, 2),
(8, 44, 2),
(48, 45, 2),
(3, 45, 2),
(6, 45, 2),
(40, 45, 2);

-- --------------------------------------------------------

--
-- Table structure for table `we_day3`
--

CREATE TABLE `we_day3` (
  `exercise_id` int(11) NOT NULL,
  `workout_id` int(11) NOT NULL,
  `day_3` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `we_day4`
--

CREATE TABLE `we_day4` (
  `exercise_id` int(11) NOT NULL,
  `workout_id` int(11) NOT NULL,
  `day_4` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `we_day4`
--

INSERT INTO `we_day4` (`exercise_id`, `workout_id`, `day_4`) VALUES
(3, 1, 4),
(2, 1, 4),
(1, 1, 4),
(5, 1, 4),
(3, 2, 4),
(5, 2, 4),
(1, 2, 4),
(5, 2, 4),
(9, 3, 4),
(8, 3, 4),
(2, 3, 4),
(19, 3, 4),
(10, 3, 4),
(29, 4, 4),
(6, 4, 4),
(3, 4, 4),
(6, 4, 4),
(16, 5, 4),
(15, 5, 4),
(46, 5, 4),
(18, 5, 4),
(34, 6, 4),
(57, 6, 4),
(4, 6, 4),
(20, 6, 4),
(45, 6, 4),
(22, 7, 4),
(34, 7, 4),
(57, 7, 4),
(4, 7, 4),
(20, 7, 4),
(23, 8, 4),
(16, 8, 4),
(20, 8, 4),
(25, 8, 4),
(28, 9, 4),
(28, 9, 4),
(26, 9, 4),
(5, 9, 4),
(22, 10, 4),
(34, 10, 4),
(57, 10, 4),
(4, 10, 4),
(3, 10, 4),
(20, 11, 4),
(26, 11, 4),
(5, 11, 4),
(28, 11, 4),
(26, 12, 4),
(5, 12, 4),
(28, 12, 4),
(34, 12, 4),
(36, 13, 4),
(37, 13, 4),
(49, 13, 4),
(52, 13, 4),
(10, 13, 4),
(39, 14, 4),
(44, 14, 4),
(41, 14, 4),
(41, 14, 4),
(43, 14, 4),
(18, 15, 4),
(46, 15, 4),
(16, 15, 4),
(24, 15, 4),
(23, 15, 4),
(29, 16, 4),
(28, 16, 4),
(34, 16, 4),
(22, 16, 4),
(42, 16, 4),
(5, 16, 4),
(42, 17, 4),
(5, 17, 4),
(20, 17, 4),
(26, 17, 4),
(5, 17, 4),
(28, 17, 4),
(34, 17, 4),
(9, 18, 4),
(8, 18, 4),
(45, 18, 4),
(19, 18, 4),
(51, 18, 4),
(36, 18, 4),
(37, 18, 4),
(49, 18, 4),
(41, 19, 4),
(43, 19, 4),
(40, 19, 4),
(32, 19, 4),
(3, 19, 4),
(6, 19, 4),
(39, 19, 4),
(46, 20, 4),
(48, 20, 4),
(46, 20, 4),
(48, 20, 4),
(16, 20, 4),
(24, 20, 4),
(23, 20, 4),
(49, 21, 4),
(19, 21, 4),
(9, 21, 4),
(20, 21, 4),
(37, 22, 4),
(19, 22, 4),
(20, 22, 4),
(52, 22, 4),
(49, 23, 4),
(19, 23, 4),
(20, 23, 4),
(9, 23, 4),
(49, 24, 4),
(19, 24, 4),
(20, 24, 4),
(9, 24, 4),
(49, 25, 4),
(19, 25, 4),
(20, 25, 4),
(9, 25, 4),
(49, 26, 4),
(19, 26, 4),
(20, 26, 4),
(52, 26, 4),
(5, 27, 4),
(26, 27, 4),
(51, 27, 4),
(45, 27, 4),
(49, 27, 4),
(37, 28, 4),
(26, 28, 4),
(51, 28, 4),
(52, 28, 4),
(5, 28, 4),
(52, 29, 4),
(19, 29, 4),
(20, 29, 4),
(51, 29, 4),
(45, 30, 4),
(19, 30, 4),
(20, 30, 4),
(37, 30, 4),
(57, 31, 4),
(36, 31, 4),
(51, 31, 4),
(9, 31, 4),
(57, 31, 4),
(37, 32, 4),
(59, 32, 4),
(60, 32, 4),
(9, 32, 4),
(10, 32, 4),
(61, 33, 4),
(10, 33, 4),
(8, 33, 4),
(39, 33, 4),
(51, 33, 4),
(10, 34, 4),
(8, 34, 4),
(51, 34, 4),
(57, 34, 4),
(37, 34, 4),
(63, 35, 4),
(61, 35, 4),
(19, 35, 4),
(32, 35, 4),
(51, 35, 4),
(5, 36, 4),
(22, 36, 4),
(63, 36, 4),
(39, 36, 4),
(1, 37, 4),
(45, 37, 4),
(34, 37, 4),
(29, 37, 4),
(26, 38, 4),
(49, 38, 4),
(41, 38, 4),
(9, 38, 4),
(26, 39, 4),
(49, 39, 4),
(41, 39, 4),
(8, 39, 4),
(5, 40, 4),
(22, 40, 4),
(4, 40, 4),
(9, 40, 4),
(3, 41, 4),
(6, 41, 4),
(43, 41, 4),
(75, 41, 4),
(51, 42, 4),
(19, 42, 4),
(32, 42, 4),
(44, 42, 4),
(3, 43, 4),
(3, 43, 4),
(3, 43, 4),
(3, 43, 4),
(6, 44, 4),
(75, 44, 4),
(39, 44, 4),
(48, 44, 4),
(6, 45, 4),
(57, 45, 4),
(6, 45, 4),
(48, 45, 4);

-- --------------------------------------------------------

--
-- Table structure for table `we_day5`
--

CREATE TABLE `we_day5` (
  `exercise_id` int(11) NOT NULL,
  `workout_id` int(11) NOT NULL,
  `day_5` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `we_day6`
--

CREATE TABLE `we_day6` (
  `exercise_id` int(11) NOT NULL,
  `workout_id` int(11) NOT NULL,
  `day_6` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `we_day6`
--

INSERT INTO `we_day6` (`exercise_id`, `workout_id`, `day_6`) VALUES
(4, 1, 6),
(3, 1, 6),
(2, 1, 6),
(1, 1, 6),
(4, 2, 6),
(3, 2, 6),
(6, 2, 6),
(1, 2, 6),
(9, 3, 6),
(8, 3, 6),
(2, 3, 6),
(19, 3, 6),
(6, 4, 6),
(29, 4, 6),
(6, 4, 6),
(3, 4, 6),
(17, 5, 6),
(16, 5, 6),
(15, 5, 6),
(46, 5, 6),
(5, 6, 6),
(22, 6, 6),
(34, 6, 6),
(57, 6, 6),
(4, 6, 6),
(45, 7, 6),
(5, 7, 6),
(22, 7, 6),
(34, 7, 6),
(57, 7, 6),
(24, 8, 6),
(23, 8, 6),
(16, 8, 6),
(20, 8, 6),
(29, 9, 6),
(28, 9, 6),
(26, 9, 6),
(5, 9, 6),
(6, 10, 6),
(20, 10, 6),
(5, 10, 6),
(22, 10, 6),
(34, 10, 6),
(20, 11, 6),
(26, 11, 6),
(5, 11, 6),
(28, 11, 6),
(22, 12, 6),
(42, 12, 6),
(20, 12, 6),
(26, 12, 6),
(9, 13, 6),
(8, 13, 6),
(45, 13, 6),
(51, 13, 6),
(36, 13, 6),
(40, 14, 6),
(3, 14, 6),
(6, 14, 6),
(39, 14, 6),
(44, 14, 6),
(17, 15, 6),
(18, 15, 6),
(46, 15, 6),
(16, 15, 6),
(24, 15, 6),
(20, 16, 6),
(26, 16, 6),
(5, 16, 6),
(29, 16, 6),
(28, 16, 6),
(34, 16, 6),
(22, 17, 6),
(42, 17, 6),
(5, 17, 6),
(20, 17, 6),
(26, 17, 6),
(5, 17, 6),
(28, 17, 6),
(52, 18, 6),
(10, 18, 6),
(9, 18, 6),
(8, 18, 6),
(45, 18, 6),
(19, 18, 6),
(51, 18, 6),
(36, 18, 6),
(44, 19, 6),
(41, 19, 6),
(41, 19, 6),
(43, 19, 6),
(40, 19, 6),
(32, 19, 6),
(3, 19, 6),
(17, 20, 6),
(18, 20, 6),
(46, 20, 6),
(48, 20, 6),
(46, 20, 6),
(48, 20, 6),
(16, 20, 6),
(52, 21, 6),
(51, 21, 6),
(45, 21, 6),
(37, 21, 6),
(5, 22, 6),
(26, 22, 6),
(51, 22, 6),
(45, 22, 6),
(37, 23, 6),
(26, 23, 6),
(51, 23, 6),
(52, 23, 6),
(51, 24, 6),
(45, 24, 6),
(5, 24, 6),
(26, 24, 6),
(37, 25, 6),
(26, 25, 6),
(5, 25, 6),
(52, 25, 6),
(51, 26, 6),
(45, 26, 6),
(37, 26, 6),
(26, 26, 6),
(9, 27, 6),
(37, 27, 6),
(19, 27, 6),
(20, 27, 6),
(52, 27, 6),
(45, 28, 6),
(49, 28, 6),
(19, 28, 6),
(20, 28, 6),
(9, 28, 6),
(5, 29, 6),
(37, 29, 6),
(49, 29, 6),
(9, 29, 6),
(5, 30, 6),
(51, 30, 6),
(49, 30, 6),
(9, 30, 6),
(51, 31, 6),
(49, 31, 6),
(9, 31, 6),
(57, 31, 6),
(57, 32, 6),
(10, 32, 6),
(37, 32, 6),
(59, 32, 6),
(60, 32, 6),
(19, 33, 6),
(32, 33, 6),
(52, 33, 6),
(59, 33, 6),
(60, 33, 6),
(5, 34, 6),
(49, 34, 6),
(9, 34, 6),
(57, 34, 6),
(36, 34, 6),
(49, 35, 6),
(61, 35, 6),
(19, 35, 6),
(32, 35, 6),
(52, 35, 6),
(4, 36, 6),
(3, 36, 6),
(20, 36, 6),
(5, 36, 6),
(42, 37, 6),
(43, 37, 6),
(26, 37, 6),
(1, 37, 6),
(59, 38, 6),
(60, 38, 6),
(20, 38, 6),
(26, 38, 6),
(63, 39, 6),
(45, 39, 6),
(20, 39, 6),
(26, 39, 6),
(59, 40, 6),
(60, 40, 6),
(20, 40, 6),
(45, 40, 6),
(48, 41, 6),
(39, 41, 6),
(40, 41, 6),
(3, 41, 6),
(57, 42, 6),
(2, 42, 6),
(37, 42, 6),
(51, 42, 6),
(3, 43, 6),
(3, 43, 6),
(3, 43, 6),
(3, 43, 6),
(43, 44, 6),
(40, 44, 6),
(8, 44, 6),
(6, 44, 6),
(3, 45, 6),
(6, 45, 6),
(40, 45, 6),
(6, 45, 6);

-- --------------------------------------------------------

--
-- Table structure for table `we_day7`
--

CREATE TABLE `we_day7` (
  `exercise_id` int(11) NOT NULL,
  `workout_id` int(11) NOT NULL,
  `day_7` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `we_day7`
--

INSERT INTO `we_day7` (`exercise_id`, `workout_id`, `day_7`) VALUES
(5, 1, 7),
(4, 1, 7),
(3, 1, 7),
(2, 1, 7),
(5, 2, 7),
(4, 2, 7),
(3, 2, 7),
(6, 2, 7),
(10, 3, 7),
(9, 3, 7),
(8, 3, 7),
(2, 3, 7),
(6, 4, 7),
(6, 4, 7),
(29, 4, 7),
(6, 4, 7),
(18, 5, 7),
(17, 5, 7),
(16, 5, 7),
(15, 5, 7),
(20, 6, 7),
(45, 6, 7),
(5, 6, 7),
(22, 6, 7),
(34, 6, 7),
(4, 7, 7),
(20, 7, 7),
(45, 7, 7),
(5, 7, 7),
(22, 7, 7),
(25, 8, 7),
(24, 8, 7),
(23, 8, 7),
(16, 8, 7),
(5, 9, 7),
(29, 9, 7),
(28, 9, 7),
(28, 9, 7),
(57, 10, 7),
(4, 10, 7),
(3, 10, 7),
(6, 10, 7),
(20, 10, 7),
(20, 11, 7),
(26, 11, 7),
(5, 11, 7),
(28, 11, 7),
(5, 12, 7),
(28, 12, 7),
(34, 12, 7),
(22, 12, 7),
(37, 13, 7),
(39, 13, 7),
(52, 13, 7),
(10, 13, 7),
(9, 13, 7),
(41, 14, 7),
(41, 14, 7),
(43, 14, 7),
(40, 14, 7),
(3, 14, 7),
(23, 15, 7),
(17, 15, 7),
(18, 15, 7),
(46, 15, 7),
(16, 15, 7),
(22, 16, 7),
(42, 16, 7),
(5, 16, 7),
(20, 16, 7),
(26, 16, 7),
(5, 16, 7),
(34, 17, 7),
(22, 17, 7),
(42, 17, 7),
(5, 17, 7),
(20, 17, 7),
(26, 17, 7),
(5, 17, 7),
(37, 18, 7),
(49, 18, 7),
(52, 18, 7),
(10, 18, 7),
(9, 18, 7),
(8, 18, 7),
(45, 18, 7),
(19, 18, 7),
(6, 19, 7),
(39, 19, 7),
(44, 19, 7),
(41, 19, 7),
(41, 19, 7),
(43, 19, 7),
(40, 19, 7),
(24, 20, 7),
(23, 20, 7),
(17, 20, 7),
(18, 20, 7),
(46, 20, 7),
(48, 20, 7),
(46, 20, 7),
(26, 21, 7),
(9, 21, 7),
(49, 21, 7),
(19, 21, 7),
(49, 22, 7),
(9, 22, 7),
(37, 22, 7),
(19, 22, 7),
(5, 23, 7),
(45, 23, 7),
(49, 23, 7),
(19, 23, 7),
(37, 24, 7),
(52, 24, 7),
(49, 24, 7),
(19, 24, 7),
(51, 25, 7),
(45, 25, 7),
(49, 25, 7),
(19, 25, 7),
(5, 26, 7),
(9, 26, 7),
(49, 26, 7),
(19, 26, 7),
(5, 27, 7),
(26, 27, 7),
(51, 27, 7),
(45, 27, 7),
(49, 27, 7),
(37, 28, 7),
(26, 28, 7),
(51, 28, 7),
(52, 28, 7),
(5, 28, 7),
(45, 29, 7),
(26, 29, 7),
(52, 29, 7),
(19, 29, 7),
(26, 30, 7),
(52, 30, 7),
(45, 30, 7),
(19, 30, 7),
(51, 31, 7),
(9, 31, 7),
(49, 31, 7),
(10, 31, 7),
(57, 31, 7),
(9, 32, 7),
(10, 32, 7),
(57, 32, 7),
(10, 32, 7),
(37, 32, 7),
(45, 33, 7),
(63, 33, 7),
(57, 33, 7),
(2, 33, 7),
(61, 33, 7),
(59, 34, 7),
(60, 34, 7),
(6, 34, 7),
(41, 34, 7),
(61, 34, 7),
(8, 35, 7),
(26, 35, 7),
(44, 35, 7),
(49, 35, 7),
(63, 35, 7),
(22, 36, 7),
(45, 37, 7),
(34, 37, 7),
(29, 37, 7),
(42, 37, 7),
(49, 38, 7),
(41, 38, 7),
(9, 38, 7),
(59, 38, 7),
(49, 39, 7),
(41, 39, 7),
(8, 39, 7),
(63, 39, 7),
(22, 40, 7),
(4, 40, 7),
(9, 40, 7),
(59, 40, 7),
(6, 41, 7),
(43, 41, 7),
(75, 41, 7),
(48, 41, 7),
(57, 42, 7),
(2, 42, 7),
(37, 42, 7),
(51, 42, 7),
(3, 43, 7),
(3, 43, 7),
(3, 43, 7),
(3, 43, 7),
(75, 44, 7),
(39, 44, 7),
(48, 44, 7),
(43, 44, 7),
(57, 45, 7),
(6, 45, 7),
(48, 45, 7),
(3, 45, 7);

-- --------------------------------------------------------

--
-- Table structure for table `workouts`
--

CREATE TABLE `workouts` (
  `workout_id` int(11) NOT NULL,
  `workout_title` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `workout_description` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `workout_goal` int(11) DEFAULT NULL,
  `workout_level` int(11) DEFAULT NULL,
  `workout_duration` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `workout_status` varchar(11) NOT NULL,
  `workout_image` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `workouts`
--

INSERT INTO `workouts` (`workout_id`, `workout_title`, `workout_description`, `workout_goal`, `workout_level`, `workout_duration`, `workout_status`, `workout_image`) VALUES
(1, 'Lower Body Basics 1', '<p>When someone asks you to make a muscle, chances are you don&rsquo;t flex your traps or rise onto your toes to show off your calves. You&#39;re going to roll up your sleeves and flex your biceps, inviting onlookers to your own personal &ldquo;gun show.&rdquo;</p><p>And while those arm-focused articles can prove helpful, many seem to present the same basic information, which can only take your gains so far. In an effort to help you bust through your biceps-building plateaus, we&#39;ve got a unique approach to promote new growth for those all-important show muscles.&nbsp;</p>', 7, 1, '3', '1', 'workout_1519944619.jpg'),
(2, 'Lower Body Basics 2', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p><p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p><p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 7, 1, '4', '1', 'workout_1519945666.jpg'),
(3, 'Upper Body Basics', '<p>When someone asks you to make a muscle, chances are you don&rsquo;t flex your traps or rise onto your toes to show off your calves. You&#39;re going to roll up your sleeves and flex your biceps, inviting onlookers to your own personal &ldquo;gun show.&rdquo;</p><p>And while those arm-focused articles can prove helpful, many seem to present the same basic information, which can only take your gains so far. In an effort to help you bust through your biceps-building plateaus, we&#39;ve got a unique approach to promote new growth for those all-important show muscles.&nbsp;</p>', 7, 1, '4', '1', 'workout_1519945022.jpg'),
(4, 'Core Strength for Beginners', '<p>When someone asks you to make a muscle, chances are you don&rsquo;t flex your traps or rise onto your toes to show off your calves. You&#39;re going to roll up your sleeves and flex your biceps, inviting onlookers to your own personal &ldquo;gun show.&rdquo;</p><p>And while those arm-focused articles can prove helpful, many seem to present the same basic information, which can only take your gains so far. In an effort to help you bust through your biceps-building plateaus, we&#39;ve got a unique approach to promote new growth for those all-important show muscles.&nbsp;</p>', 7, 1, '3', '1', 'workout_1519945561.jpg'),
(5, 'Cardio for Beginners', '<p>When someone asks you to make a muscle, chances are you don&rsquo;t flex your traps or rise onto your toes to show off your calves. You&#39;re going to roll up your sleeves and flex your biceps, inviting onlookers to your own personal &ldquo;gun show.&rdquo;</p><p>And while those arm-focused articles can prove helpful, many seem to present the same basic information, which can only take your gains so far. In an effort to help you bust through your biceps-building plateaus, we&#39;ve got a unique approach to promote new growth for those all-important show muscles.&nbsp;</p>', 7, 1, '4', '1', 'workout_1519945908.jpg'),
(6, 'Lower Body Challenge 1', '<p>When someone asks you to make a muscle, chances are you don&rsquo;t flex your traps or rise onto your toes to show off your calves. You&#39;re going to roll up your sleeves and flex your biceps, inviting onlookers to your own personal &ldquo;gun show.&rdquo;</p><p>And while those arm-focused articles can prove helpful, many seem to present the same basic information, which can only take your gains so far. In an effort to help you bust through your biceps-building plateaus, we&#39;ve got a unique approach to promote new growth for those all-important show muscles.&nbsp;</p>', 7, 2, '5', '1', 'workout_1519946537.jpg'),
(7, 'Lower Body Challenge 2', '<p>When someone asks you to make a muscle, chances are you don&rsquo;t flex your traps or rise onto your toes to show off your calves. You&#39;re going to roll up your sleeves and flex your biceps, inviting onlookers to your own personal &ldquo;gun show.&rdquo;</p><p>And while those arm-focused articles can prove helpful, many seem to present the same basic information, which can only take your gains so far. In an effort to help you bust through your biceps-building plateaus, we&#39;ve got a unique approach to promote new growth for those all-important show muscles.&nbsp;</p>', 7, 4, '4', '1', 'workout_1519947040.jpg'),
(8, 'Lower Body and Cardio', '<p>When someone asks you to make a muscle, chances are you don&rsquo;t flex your traps or rise onto your toes to show off your calves. You&#39;re going to roll up your sleeves and flex your biceps, inviting onlookers to your own personal &ldquo;gun show.&rdquo;</p><p>And while those arm-focused articles can prove helpful, many seem to present the same basic information, which can only take your gains so far. In an effort to help you bust through your biceps-building plateaus, we&#39;ve got a unique approach to promote new growth for those all-important show muscles.&nbsp;</p>', 7, 2, '3', '1', 'workout_1519947305.jpg'),
(9, 'Lower Body Power', '<p>When someone asks you to make a muscle, chances are you don&rsquo;t flex your traps or rise onto your toes to show off your calves. You&#39;re going to roll up your sleeves and flex your biceps, inviting onlookers to your own personal &ldquo;gun show.&rdquo;</p><p>And while those arm-focused articles can prove helpful, many seem to present the same basic information, which can only take your gains so far. In an effort to help you bust through your biceps-building plateaus, we&#39;ve got a unique approach to promote new growth for those all-important show muscles.&nbsp;</p>', 7, 2, '3', '1', 'workout_1519947591.jpg'),
(10, 'Lower Body and Core', '<p>When someone asks you to make a muscle, chances are you don&rsquo;t flex your traps or rise onto your toes to show off your calves. You&#39;re going to roll up your sleeves and flex your biceps, inviting onlookers to your own personal &ldquo;gun show.&rdquo;</p><p>And while those arm-focused articles can prove helpful, many seem to present the same basic information, which can only take your gains so far. In an effort to help you bust through your biceps-building plateaus, we&#39;ve got a unique approach to promote new growth for those all-important show muscles.&nbsp;</p>', 7, 2, '4', '1', 'workout_1519948742.jpg'),
(11, 'Advanced Lower Body Workout 1', '<p>When someone asks you to make a muscle, chances are you don&rsquo;t flex your traps or rise onto your toes to show off your calves. You&#39;re going to roll up your sleeves and flex your biceps, inviting onlookers to your own personal &ldquo;gun show.&rdquo;</p><p>And while those arm-focused articles can prove helpful, many seem to present the same basic information, which can only take your gains so far. In an effort to help you bust through your biceps-building plateaus, we&#39;ve got a unique approach to promote new growth for those all-important show muscles.&nbsp;</p>', 7, 3, '4', '1', 'workout_1519948891.jpg'),
(12, 'Advanced Lower Body Workout 2', '<p>When someone asks you to make a muscle, chances are you don&rsquo;t flex your traps or rise onto your toes to show off your calves. You&#39;re going to roll up your sleeves and flex your biceps, inviting onlookers to your own personal &ldquo;gun show.&rdquo;</p><p>And while those arm-focused articles can prove helpful, many seem to present the same basic information, which can only take your gains so far. In an effort to help you bust through your biceps-building plateaus, we&#39;ve got a unique approach to promote new growth for those all-important show muscles.&nbsp;</p>', 7, 3, '5', '1', 'workout_1519949368.jpg'),
(13, 'Advanced Upper Body Workout', '<p>When someone asks you to make a muscle, chances are you don&rsquo;t flex your traps or rise onto your toes to show off your calves. You&#39;re going to roll up your sleeves and flex your biceps, inviting onlookers to your own personal &ldquo;gun show.&rdquo;</p><p>And while those arm-focused articles can prove helpful, many seem to present the same basic information, which can only take your gains so far. In an effort to help you bust through your biceps-building plateaus, we&#39;ve got a unique approach to promote new growth for those all-important show muscles.&nbsp;</p>', 7, 3, '3', '1', 'workout_1519949759.jpg'),
(14, 'Advanced Core Workout', '<p>When someone asks you to make a muscle, chances are you don&rsquo;t flex your traps or rise onto your toes to show off your calves. You&#39;re going to roll up your sleeves and flex your biceps, inviting onlookers to your own personal &ldquo;gun show.&rdquo;</p><p>And while those arm-focused articles can prove helpful, many seem to present the same basic information, which can only take your gains so far. In an effort to help you bust through your biceps-building plateaus, we&#39;ve got a unique approach to promote new growth for those all-important show muscles.&nbsp;</p>', 7, 3, '4', '1', 'workout_1519949966.jpg'),
(15, 'Advanced Cardio Workout', '<p>When someone asks you to make a muscle, chances are you don&rsquo;t flex your traps or rise onto your toes to show off your calves. You&#39;re going to roll up your sleeves and flex your biceps, inviting onlookers to your own personal &ldquo;gun show.&rdquo;</p><p>And while those arm-focused articles can prove helpful, many seem to present the same basic information, which can only take your gains so far. In an effort to help you bust through your biceps-building plateaus, we&#39;ve got a unique approach to promote new growth for those all-important show muscles.&nbsp;</p>', 7, 3, '3', '1', 'workout_1519950276.jpg'),
(16, 'Elite Lower Body Workout 1', '<p>When someone asks you to make a muscle, chances are you don&rsquo;t flex your traps or rise onto your toes to show off your calves. You&#39;re going to roll up your sleeves and flex your biceps, inviting onlookers to your own personal &ldquo;gun show.&rdquo;</p><p>And while those arm-focused articles can prove helpful, many seem to present the same basic information, which can only take your gains so far. In an effort to help you bust through your biceps-building plateaus, we&#39;ve got a unique approach to promote new growth for those all-important show muscles.&nbsp;</p>', 7, 4, '4', '1', 'workout_1519950433.jpg'),
(17, 'Elite Lower Body Workout 2', '<p>When someone asks you to make a muscle, chances are you don&rsquo;t flex your traps or rise onto your toes to show off your calves. You&#39;re going to roll up your sleeves and flex your biceps, inviting onlookers to your own personal &ldquo;gun show.&rdquo;</p><p>And while those arm-focused articles can prove helpful, many seem to present the same basic information, which can only take your gains so far. In an effort to help you bust through your biceps-building plateaus, we&#39;ve got a unique approach to promote new growth for those all-important show muscles.&nbsp;</p>', 7, 4, '4', '1', 'workout_1519950433.jpg'),
(18, 'Elite Upper Body Workout', '<p>When someone asks you to make a muscle, chances are you don&rsquo;t flex your traps or rise onto your toes to show off your calves. You&#39;re going to roll up your sleeves and flex your biceps, inviting onlookers to your own personal &ldquo;gun show.&rdquo;</p><p>And while those arm-focused articles can prove helpful, many seem to present the same basic information, which can only take your gains so far. In an effort to help you bust through your biceps-building plateaus, we&#39;ve got a unique approach to promote new growth for those all-important show muscles.&nbsp;</p>', 7, 4, '4', '1', 'workout_1519950433.jpg'),
(19, 'Elite Core Workout', '<p>When someone asks you to make a muscle, chances are you don&rsquo;t flex your traps or rise onto your toes to show off your calves. You&#39;re going to roll up your sleeves and flex your biceps, inviting onlookers to your own personal &ldquo;gun show.&rdquo;</p><p>And while those arm-focused articles can prove helpful, many seem to present the same basic information, which can only take your gains so far. In an effort to help you bust through your biceps-building plateaus, we&#39;ve got a unique approach to promote new growth for those all-important show muscles.&nbsp;</p>', 7, 4, '4', '1', 'workout_1519950433.jpg'),
(20, 'Elite Cardio Workout', '<p>When someone asks you to make a muscle, chances are you don&rsquo;t flex your traps or rise onto your toes to show off your calves. You&#39;re going to roll up your sleeves and flex your biceps, inviting onlookers to your own personal &ldquo;gun show.&rdquo;</p><p>And while those arm-focused articles can prove helpful, many seem to present the same basic information, which can only take your gains so far. In an effort to help you bust through your biceps-building plateaus, we&#39;ve got a unique approach to promote new growth for those all-important show muscles.&nbsp;</p>', 7, 4, '4', '1', 'workout_1519950433.jpg'),
(21, 'Shape Shifter', '<p>When someone asks you to make a muscle, chances are you don&rsquo;t flex your traps or rise onto your toes to show off your calves. You&#39;re going to roll up your sleeves and flex your biceps, inviting onlookers to your own personal &ldquo;gun show.&rdquo;</p><p>And while those arm-focused articles can prove helpful, many seem to present the same basic information, which can only take your gains so far. In an effort to help you bust through your biceps-building plateaus, we&#39;ve got a unique approach to promote new growth for those all-important show muscles.&nbsp;</p>', 1, 5, '3', '1', 'workout_1519944619.jpg'),
(22, 'Metamorphosis', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p><p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p><p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 1, 5, '4', '1', 'workout_1519945666.jpg'),
(23, 'Transformation Station', '<p>When someone asks you to make a muscle, chances are you don&rsquo;t flex your traps or rise onto your toes to show off your calves. You&#39;re going to roll up your sleeves and flex your biceps, inviting onlookers to your own personal &ldquo;gun show.&rdquo;</p><p>And while those arm-focused articles can prove helpful, many seem to present the same basic information, which can only take your gains so far. In an effort to help you bust through your biceps-building plateaus, we&#39;ve got a unique approach to promote new growth for those all-important show muscles.&nbsp;</p>', 7, 1, '3', '1', 'workout_1519944619.jpg'),
(24, 'Muscle Morph', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p><p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p><p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 1, 5, '4', '1', 'workout_1519945666.jpg'),
(25, 'Fitness Fusion', '<p>When someone asks you to make a muscle, chances are you don&rsquo;t flex your traps or rise onto your toes to show off your calves. You&#39;re going to roll up your sleeves and flex your biceps, inviting onlookers to your own personal &ldquo;gun show.&rdquo;</p><p>And while those arm-focused articles can prove helpful, many seem to present the same basic information, which can only take your gains so far. In an effort to help you bust through your biceps-building plateaus, we&#39;ve got a unique approach to promote new growth for those all-important show muscles.&nbsp;</p>', 1, 5, '4', '1', 'workout_1519945022.jpg'),
(26, 'Powerhouse', '<p>When someone asks you to make a muscle, chances are you don&rsquo;t flex your traps or rise onto your toes to show off your calves. You&#39;re going to roll up your sleeves and flex your biceps, inviting onlookers to your own personal &ldquo;gun show.&rdquo;</p><p>And while those arm-focused articles can prove helpful, many seem to present the same basic information, which can only take your gains so far. In an effort to help you bust through your biceps-building plateaus, we&#39;ve got a unique approach to promote new growth for those all-important show muscles.&nbsp;</p>', 2, 5, '3', '1', 'workout_1519945561.jpg'),
(27, 'Iron Titan', '<p>When someone asks you to make a muscle, chances are you don&rsquo;t flex your traps or rise onto your toes to show off your calves. You&#39;re going to roll up your sleeves and flex your biceps, inviting onlookers to your own personal &ldquo;gun show.&rdquo;</p><p>And while those arm-focused articles can prove helpful, many seem to present the same basic information, which can only take your gains so far. In an effort to help you bust through your biceps-building plateaus, we&#39;ve got a unique approach to promote new growth for those all-important show muscles.&nbsp;</p>', 2, 5, '4', '1', 'workout_1519945908.jpg'),
(28, 'Muscle Mastery', '<p>When someone asks you to make a muscle, chances are you don&rsquo;t flex your traps or rise onto your toes to show off your calves. You&#39;re going to roll up your sleeves and flex your biceps, inviting onlookers to your own personal &ldquo;gun show.&rdquo;</p><p>And while those arm-focused articles can prove helpful, many seem to present the same basic information, which can only take your gains so far. In an effort to help you bust through your biceps-building plateaus, we&#39;ve got a unique approach to promote new growth for those all-important show muscles.&nbsp;</p>', 2, 5, '5', '1', 'workout_1519946537.jpg'),
(29, 'Goliath\'s Gainz', '<p>When someone asks you to make a muscle, chances are you don&rsquo;t flex your traps or rise onto your toes to show off your calves. You&#39;re going to roll up your sleeves and flex your biceps, inviting onlookers to your own personal &ldquo;gun show.&rdquo;</p><p>And while those arm-focused articles can prove helpful, many seem to present the same basic information, which can only take your gains so far. In an effort to help you bust through your biceps-building plateaus, we&#39;ve got a unique approach to promote new growth for those all-important show muscles.&nbsp;</p>', 2, 5, '4', '1', 'workout_1519947040.jpg'),
(30, 'Mighty Morph', '<p>When someone asks you to make a muscle, chances are you don&rsquo;t flex your traps or rise onto your toes to show off your calves. You&#39;re going to roll up your sleeves and flex your biceps, inviting onlookers to your own personal &ldquo;gun show.&rdquo;</p><p>And while those arm-focused articles can prove helpful, many seem to present the same basic information, which can only take your gains so far. In an effort to help you bust through your biceps-building plateaus, we&#39;ve got a unique approach to promote new growth for those all-important show muscles.&nbsp;</p>', 2, 5, '3', '1', 'workout_1519947305.jpg'),
(31, 'Upper Body Powerhouse', '<p>When someone asks you to make a muscle, chances are you don&rsquo;t flex your traps or rise onto your toes to show off your calves. You&#39;re going to roll up your sleeves and flex your biceps, inviting onlookers to your own personal &ldquo;gun show.&rdquo;</p><p>And while those arm-focused articles can prove helpful, many seem to present the same basic information, which can only take your gains so far. In an effort to help you bust through your biceps-building plateaus, we&#39;ve got a unique approach to promote new growth for those all-important show muscles.&nbsp;</p>', 3, 4, '3', '1', 'workout_1519947591.jpg'),
(32, 'Arm and Shoulder Blast', '<p>When someone asks you to make a muscle, chances are you don&rsquo;t flex your traps or rise onto your toes to show off your calves. You&#39;re going to roll up your sleeves and flex your biceps, inviting onlookers to your own personal &ldquo;gun show.&rdquo;</p><p>And while those arm-focused articles can prove helpful, many seem to present the same basic information, which can only take your gains so far. In an effort to help you bust through your biceps-building plateaus, we&#39;ve got a unique approach to promote new growth for those all-important show muscles.&nbsp;</p>', 3, 5, '4', '1', 'workout_1519948742.jpg'),
(33, 'Upper Body Sculpt and Tone', '<p>When someone asks you to make a muscle, chances are you don&rsquo;t flex your traps or rise onto your toes to show off your calves. You&#39;re going to roll up your sleeves and flex your biceps, inviting onlookers to your own personal &ldquo;gun show.&rdquo;</p><p>And while those arm-focused articles can prove helpful, many seem to present the same basic information, which can only take your gains so far. In an effort to help you bust through your biceps-building plateaus, we&#39;ve got a unique approach to promote new growth for those all-important show muscles.&nbsp;</p>', 3, 5, '4', '1', 'workout_1519948891.jpg'),
(34, 'Upper Body Strength and Definition', '<p>When someone asks you to make a muscle, chances are you don&rsquo;t flex your traps or rise onto your toes to show off your calves. You&#39;re going to roll up your sleeves and flex your biceps, inviting onlookers to your own personal &ldquo;gun show.&rdquo;</p><p>And while those arm-focused articles can prove helpful, many seem to present the same basic information, which can only take your gains so far. In an effort to help you bust through your biceps-building plateaus, we&#39;ve got a unique approach to promote new growth for those all-important show muscles.&nbsp;</p>', 3, 5, '5', '1', 'workout_1519949368.jpg'),
(35, 'Back and Chest Builder', '<p>When someone asks you to make a muscle, chances are you don&rsquo;t flex your traps or rise onto your toes to show off your calves. You&#39;re going to roll up your sleeves and flex your biceps, inviting onlookers to your own personal &ldquo;gun show.&rdquo;</p><p>And while those arm-focused articles can prove helpful, many seem to present the same basic information, which can only take your gains so far. In an effort to help you bust through your biceps-building plateaus, we&#39;ve got a unique approach to promote new growth for those all-important show muscles.&nbsp;</p>', 3, 5, '3', '1', 'workout_1519949759.jpg'),
(36, 'Lower Body Blast', '<p>When someone asks you to make a muscle, chances are you don&rsquo;t flex your traps or rise onto your toes to show off your calves. You&#39;re going to roll up your sleeves and flex your biceps, inviting onlookers to your own personal &ldquo;gun show.&rdquo;</p><p>And while those arm-focused articles can prove helpful, many seem to present the same basic information, which can only take your gains so far. In an effort to help you bust through your biceps-building plateaus, we&#39;ve got a unique approach to promote new growth for those all-important show muscles.&nbsp;</p>', 4, 5, '4', '1', 'workout_1519949966.jpg'),
(37, 'Legs and Glutes', '<p>When someone asks you to make a muscle, chances are you don&rsquo;t flex your traps or rise onto your toes to show off your calves. You&#39;re going to roll up your sleeves and flex your biceps, inviting onlookers to your own personal &ldquo;gun show.&rdquo;</p><p>And while those arm-focused articles can prove helpful, many seem to present the same basic information, which can only take your gains so far. In an effort to help you bust through your biceps-building plateaus, we&#39;ve got a unique approach to promote new growth for those all-important show muscles.&nbsp;</p>', 4, 5, '3', '1', 'workout_1519950276.jpg'),
(38, 'Squat and Deadlift Challenge', '<p>When someone asks you to make a muscle, chances are you don&rsquo;t flex your traps or rise onto your toes to show off your calves. You&#39;re going to roll up your sleeves and flex your biceps, inviting onlookers to your own personal &ldquo;gun show.&rdquo;</p><p>And while those arm-focused articles can prove helpful, many seem to present the same basic information, which can only take your gains so far. In an effort to help you bust through your biceps-building plateaus, we&#39;ve got a unique approach to promote new growth for those all-important show muscles.&nbsp;</p>', 4, 5, '4', '1', 'workout_1519950433.jpg'),
(39, 'Powerful Lower Body', '<p>When someone asks you to make a muscle, chances are you don&rsquo;t flex your traps or rise onto your toes to show off your calves. You&#39;re going to roll up your sleeves and flex your biceps, inviting onlookers to your own personal &ldquo;gun show.&rdquo;</p><p>And while those arm-focused articles can prove helpful, many seem to present the same basic information, which can only take your gains so far. In an effort to help you bust through your biceps-building plateaus, we&#39;ve got a unique approach to promote new growth for those all-important show muscles.&nbsp;</p>', 4, 5, '4', '1', 'workout_1519950433.jpg'),
(40, 'Strong and Lean Legs', '<p>When someone asks you to make a muscle, chances are you don&rsquo;t flex your traps or rise onto your toes to show off your calves. You&#39;re going to roll up your sleeves and flex your biceps, inviting onlookers to your own personal &ldquo;gun show.&rdquo;</p><p>And while those arm-focused articles can prove helpful, many seem to present the same basic information, which can only take your gains so far. In an effort to help you bust through your biceps-building plateaus, we&#39;ve got a unique approach to promote new growth for those all-important show muscles.&nbsp;</p>', 4, 5, '4', '1', 'workout_1519950433.jpg'),
(41, 'Core Crusher', '<p>When someone asks you to make a muscle, chances are you don&rsquo;t flex your traps or rise onto your toes to show off your calves. You&#39;re going to roll up your sleeves and flex your biceps, inviting onlookers to your own personal &ldquo;gun show.&rdquo;</p><p>And while those arm-focused articles can prove helpful, many seem to present the same basic information, which can only take your gains so far. In an effort to help you bust through your biceps-building plateaus, we&#39;ve got a unique approach to promote new growth for those all-important show muscles.&nbsp;</p>', 5, 5, '4', '1', 'workout_1519950433.jpg'),
(42, 'Abs of Steel', '<p>When someone asks you to make a muscle, chances are you don&rsquo;t flex your traps or rise onto your toes to show off your calves. You&#39;re going to roll up your sleeves and flex your biceps, inviting onlookers to your own personal &ldquo;gun show.&rdquo;</p><p>And while those arm-focused articles can prove helpful, many seem to present the same basic information, which can only take your gains so far. In an effort to help you bust through your biceps-building plateaus, we&#39;ve got a unique approach to promote new growth for those all-important show muscles.&nbsp;</p>', 5, 5, '4', '1', 'workout_1519950433.jpg'),
(43, 'Shape Shifter', '<p>When someone asks you to make a muscle, chances are you don&rsquo;t flex your traps or rise onto your toes to show off your calves. You&#39;re going to roll up your sleeves and flex your biceps, inviting onlookers to your own personal &ldquo;gun show.&rdquo;</p><p>And while those arm-focused articles can prove helpful, many seem to present the same basic information, which can only take your gains so far. In an effort to help you bust through your biceps-building plateaus, we&#39;ve got a unique approach to promote new growth for those all-important show muscles.&nbsp;</p>', 5, 5, '3', '1', 'workout_1519944619.jpg'),
(44, 'Powerhouse Planks', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p><p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p><p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 5, 5, '4', '1', 'workout_1519945666.jpg'),
(45, 'Core Blast', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p><p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p><p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 5, 5, '4', '1', 'workout_1519945666.jpg'),
(46, 'Six-Pack Sprint', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p><p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p><p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 5, 5, '4', '1', 'workout_1519945666.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bodyparts`
--
ALTER TABLE `bodyparts`
  ADD PRIMARY KEY (`bodypart_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `diets`
--
ALTER TABLE `diets`
  ADD PRIMARY KEY (`diet_id`),
  ADD KEY `FK_categories` (`diet_category`);

--
-- Indexes for table `equipments`
--
ALTER TABLE `equipments`
  ADD PRIMARY KEY (`equipment_id`);

--
-- Indexes for table `exercises`
--
ALTER TABLE `exercises`
  ADD PRIMARY KEY (`exercise_id`),
  ADD KEY `FK_exercises_equipments` (`exercise_equipment`),
  ADD KEY `FK_exercises_levels` (`exercise_level`);

--
-- Indexes for table `exercises_bodyparts`
--
ALTER TABLE `exercises_bodyparts`
  ADD KEY `FK_exercises_bodyparts_bodyparts` (`bodypart_id`),
  ADD KEY `FK_exercises_bodyparts_exercises` (`exercise_id`);

--
-- Indexes for table `goals`
--
ALTER TABLE `goals`
  ADD PRIMARY KEY (`goal_id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`level_id`);

--
-- Indexes for table `managers`
--
ALTER TABLE `managers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `FK_categories` (`post_tag`);

--
-- Indexes for table `quotes`
--
ALTER TABLE `quotes`
  ADD PRIMARY KEY (`quote_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tag_id`);

--
-- Indexes for table `workouts`
--
ALTER TABLE `workouts`
  ADD PRIMARY KEY (`workout_id`),
  ADD KEY `FK_workouts_goals` (`workout_goal`),
  ADD KEY `FK_workouts_levels` (`workout_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bodyparts`
--
ALTER TABLE `bodyparts`
  MODIFY `bodypart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `diets`
--
ALTER TABLE `diets`
  MODIFY `diet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `equipments`
--
ALTER TABLE `equipments`
  MODIFY `equipment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `exercises`
--
ALTER TABLE `exercises`
  MODIFY `exercise_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `goals`
--
ALTER TABLE `goals`
  MODIFY `goal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `level_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `managers`
--
ALTER TABLE `managers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `quotes`
--
ALTER TABLE `quotes`
  MODIFY `quote_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `workouts`
--
ALTER TABLE `workouts`
  MODIFY `workout_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `diets`
--
ALTER TABLE `diets`
  ADD CONSTRAINT `FK_categories` FOREIGN KEY (`diet_category`) REFERENCES `categories` (`category_id`);

--
-- Constraints for table `exercises`
--
ALTER TABLE `exercises`
  ADD CONSTRAINT `FK_exercises_equipments` FOREIGN KEY (`exercise_equipment`) REFERENCES `equipments` (`equipment_id`),
  ADD CONSTRAINT `FK_exercises_levels` FOREIGN KEY (`exercise_level`) REFERENCES `levels` (`level_id`);

--
-- Constraints for table `exercises_bodyparts`
--
ALTER TABLE `exercises_bodyparts`
  ADD CONSTRAINT `FK_exercises_bodyparts_bodyparts` FOREIGN KEY (`bodypart_id`) REFERENCES `bodyparts` (`bodypart_id`),
  ADD CONSTRAINT `FK_exercises_bodyparts_exercises` FOREIGN KEY (`exercise_id`) REFERENCES `exercises` (`exercise_id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`post_tag`) REFERENCES `tags` (`tag_id`);

--
-- Constraints for table `workouts`
--
ALTER TABLE `workouts`
  ADD CONSTRAINT `FK_workouts_goals` FOREIGN KEY (`workout_goal`) REFERENCES `goals` (`goal_id`),
  ADD CONSTRAINT `FK_workouts_levels` FOREIGN KEY (`workout_level`) REFERENCES `levels` (`level_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
