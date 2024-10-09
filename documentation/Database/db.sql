INSERT INTO
	`cities` (
		`id`,
		`name`,
		`state`,
		`country`,
		`created_at`,
		`updated_at`
	)
VALUES
	(1, 'New York', 'New York', 'USA', NOW(), NOW()),
	(
		2,
		'Los Angeles',
		'California',
		'USA',
		NOW(),
		NOW()
	),
	(3, 'Chicago', 'Illinois', 'USA', NOW(), NOW()),
	(4, 'Houston', 'Texas', 'USA', NOW(), NOW()),
	(5, 'Phoenix', 'Arizona', 'USA', NOW(), NOW());

INSERT INTO
	`localities` (
		`id`,
		`city_id`,
		`name`,
		`description`,
		`created_at`,
		`updated_at`
	)
VALUES
	(
		1,
		1,
		'Downtown',
		'The central business district with high-rise buildings.',
		NOW(),
		NOW()
	),
	(
		2,
		1,
		'Uptown',
		'A residential area known for its parks and schools.',
		NOW(),
		NOW()
	),
	(
		3,
		2,
		'Old Town',
		'Historic area with cobblestone streets and vintage shops.',
		NOW(),
		NOW()
	),
	(
		4,
		2,
		'New Suburb',
		'A growing neighborhood with modern amenities.',
		NOW(),
		NOW()
	),
	(
		5,
		3,
		'Riverside',
		'A scenic area along the river with walking trails.',
		NOW(),
		NOW()
	);

INSERT INTO
	`landmarks` (
		`id`,
		`locality_id`,
		`name`,
		`description`,
		`created_at`,
		`updated_at`
	)
VALUES
	(
		1,
		1,
		'Statue of Liberty',
		'A colossal neoclassical sculpture on Liberty Island.',
		NOW(),
		NOW()
	),
	(
		2,
		1,
		'Central Park',
		'A large public park in New York City.',
		NOW(),
		NOW()
	),
	(
		3,
		2,
		'Golden Gate Bridge',
		'A suspension bridge spanning the Golden Gate strait.',
		NOW(),
		NOW()
	),
	(
		4,
		2,
		'Alcatraz Island',
		'A small island with a famous former prison.',
		NOW(),
		NOW()
	),
	(
		5,
		3,
		'Eiffel Tower',
		'An iron lattice tower in Paris.',
		NOW(),
		NOW()
	);

INSERT INTO
	`builders` (
		`id`,
		`name`,
		`contact_info`,
		`website`,
		`created_at`,
		`updated_at`
	)
VALUES
	(
		1,
		'Builder One',
		'123-456-7890',
		'www.builderone.com',
		NOW(),
		NOW()
	),
	(
		2,
		'Builder Two',
		'987-654-3210',
		'www.buildertwo.com',
		NOW(),
		NOW()
	),
	(
		3,
		'Builder Three',
		'555-123-4567',
		'www.builderthree.com',
		NOW(),
		NOW()
	),
	(
		4,
		'Builder Four',
		'444-987-6543',
		'www.builderfour.com',
		NOW(),
		NOW()
	),
	(
		5,
		'Builder Five',
		'333-222-1111',
		'www.builderfive.com',
		NOW(),
		NOW()
	);

INSERT INTO
	`projects`(
		`id`,
		`locality_id`,
		`builder_id`,
		`project_name`,
		`developer`,
		`address`,
		`pricing`,
		`avg_price`,
		`emi_starts`,
		`rera_status`,
		`contact_seller`,
		`configuration`,
		`possession_starts`,
		`carpet_area`,
		`why_to_choose`,
		`around_this_project`,
		`segments`,
		`overview`,
		`size`,
		`project_size`,
		`launched_date`,
		`rera_id`,
		`more_about_project`,
		`image_path`,
		`created_at`,
		`updated_at`
	)
VALUES
	(
		1,
		1,
		1,
		'Sunset Heights',
		'Sunset Developers',
		'123 Sunset Blvd, Cityville',
		50000.00,
		4500.00,
		5000.00,
		'approved',
		'John Doe: 1234567890',
		'2BHK, 3BHK',
		'2024-12-01',
		950.00,
		'Great amenities and location.',
		'Parks, schools, shopping malls.',
		'Residential',
		'Luxury apartments with modern design.',
		1000.00,
		1500.00,
		'2024-01-15',
		'RERA123456',
		'Detailed project overview available.',
		'/images/projects/sunset_heights.jpg',
		NOW(),
		NOW()
	),
	(
		2,
		2,
		2,
		'Green Valley Homes',
		'Green Builders',
		'456 Greenway Rd, Townsville',
		60000.00,
		5500.00,
		6000.00,
		'approved',
		'Jane Smith: 0987654321',
		'1BHK, 2BHK',
		NULL,
		800.00,
		'Eco-friendly living spaces.',
		'Schools and hospitals nearby.',
		'Residential',
		'Affordable homes with green spaces.',
		600.00,
		1000.00,
		NOW(),
		'RERA654321',
		'Comprehensive details available.',
		'/images/projects/green_valley_homes.jpg',
		NOW(),
		NOW()
	),
	(
		3,
		3,
		3,
		'Skyline Towers',
		'Skyline Developers',
		'789 Skyline St, Metropolis',
		70000.00,
		7000.00,
		'7000/month',
		'pending',
		'Alice Johnson: 1122334455',
		'3BHK,Penthouse',
		'2025-06-15',
		NULL,
		'Modern apartments with great views.',
		NULL,
		'Close to public transport.',
		NULL,
		'Residential',
		'Luxury living at its best.',
		NULL,
		'900 sq ft -1500 sq ft',
		'2024-01-01',
		'/images/projects/skyline_towers.jpg',
		NOW(),
		NOW()
	)
INSERT INTO
	`floors`(
		`id`,
		`project_id`,
		`floor_section`,
		`floor_segment_1`,
		`segment_price_1`,
		`segment_sqft_1`,
		`segment_emi_1`,
		`segment_floor_image_1`,
		`created_at`,
		`updated_at`
	)
VALUES
	(
		1,
		1,
		'Ground Floor',
		'2BHK',
		3000000.00,
		950.00,
		25000.00,
		'/images/floors/ground_floor_2bhk.jpg',
		NOW(),
		NOW()
	),
	(
		2,
		1,
		'First Floor',
		'3BHK',
		4000000.00,
		1200.00,
		32000.00,
		'/images/floors/first_floor_3bhk.jpg',
		NOW(),
		NOW()
	),
	(
		3,
		2,
		'Second Floor',
		'1BHK',
		2500000.00,
		800.00,
		21000.00,
		'/images/floors/second_floor_1bhk.jpg',
		NOW(),
		NOW()
	),
	(
		4,
		2,
		'Third Floor',
		'2BHK',
		3500000.00,
		1000.00,
		27000.00,
		'/images/floors/third_floor_2bhk.jpg',
		NOW(),
		NOW()
	),
	(
		5,
		3,
		'Fourth Floor',
		'Penthouse',
		6000000.00,
		1500.00,
		50000.00,
		'/images/floors/fourth_floor_penthouse.jpg',
		NOW(),
		NOW()
	);

INSERT INTO
	`amenities` (
		`id`,
		`project_id`,
		`amenities`,
		`amenities_icon`,
		`created_at`,
		`updated_at`
	)
VALUES
	(
		1,
		1,
		'Swimming Pool',
		'/icons/swimming_pool.png',
		NOW(),
		NOW()
	),
	(
		2,
		1,
		'Gymnasium',
		'/icons/gymnasium.png',
		NOW(),
		NOW()
	),
	(
		3,
		2,
		'Children\'s Play Area',
		'/icons/play_area.png',
		NOW(),
		NOW()
	),
	(
		4,
		2,
		'Clubhouse',
		'/icons/clubhouse.png',
		NOW(),
		NOW()
	),
	(
		5,
		3,
		'24/7 Security',
		'/icons/security.png',
		NOW(),
		NOW()
	);

INSERT INTO
	`project_details` (
		`id`,
		`project_id`,
		`project_specification`,
		`locality_advantage`,
		`review`,
		`project_brochure`,
		`project_payment_plan`,
		`project_offer`,
		`created_at`,
		`updated_at`
	)
VALUES
	(
		1,
		1,
		'High-quality construction with modern amenities.',
		'Located in a prime area with easy access to schools and hospitals.',
		'Excellent project with great value for money.',
		'/brochures/sunset_heights_brochure.pdf',
		'10% booking amount, balance on possession.',
		'Limited time offer: Free parking space for first 10 buyers.',
		NOW(),
		NOW()
	),
	(
		2,
		1,
		'Eco-friendly design with energy-efficient features.',
		'Surrounded by parks and recreational areas.',
		'Highly recommended for families looking for a peaceful environment.',
		'/brochures/green_valley_homes_brochure.pdf',
		'15% booking amount, flexible payment plans available.',
		'Discount on registration fees for early bookings.',
		NOW(),
		NOW()
	),
	(
		3,
		2,
		'Spacious layouts with premium finishes.',
		'Close to major shopping centers and public transport.',
		'A great investment opportunity in a growing neighborhood.',
		'/brochures/skyline_towers_brochure.pdf',
		'20% booking amount, EMI options available.',
		'Special offer: Free home decor consultation for buyers.',
		NOW(),
		NOW()
	),
	(
		4,
		2,
		'Luxury living with top-notch security features.',
		'Well-connected to the city center and major highways.',
		'A fantastic choice for those seeking a modern lifestyle.',
		'/brochures/oceanview_residences_brochure.pdf',
		'25% booking amount, staggered payment plan.',
		'Exclusive offer: Complimentary gym membership for one year.',
		NOW(),
		NOW()
	),
	(
		5,
		3,
		'Contemporary design with spacious balconies and terraces.',
		'Located near educational institutions and healthcare facilities.',
		'Perfect for those who appreciate quality living spaces.',
		'/brochures/hilltop_villas_brochure.pdf',
		'30% booking amount, easy financing options available.',
		'Limited-time offer: Free landscaping service for new homeowners.',
		NOW(),
		NOW()
	);

INSERT INTO
	`markets` (
		`id`,
		`project_id`,
		`map_view`,
		`locality_guide`,
		`compare_properties`,
		`about_developer`,
		`questions_and_answers`,
		`projects_by_group`,
		`similar_projects`,
		`recently_added`,
		`resale_project`,
		`new_project`,
		`news_and_articles`,
		`created_at`,
		`updated_at`
	)
VALUES
	(
		1,
		1,
		'/maps/sunset_heights_map.png',
		'Guide to local amenities and schools.',
		'Compare with Green Valley Homes and Skyline Towers.',
		'Developer: Sunset Developers. Established in 2005.',
		'What are the EMI options?',
		'Projects by Sunset Developers: Hilltop Villas, Oceanview Residences.',
		'Similar projects: Green Valley Homes, Skyline Towers.',
		'Recently added: Oceanview Residences.',
		'Resale project available: 2BHK in Sunset Heights.',
		'New project: Green Valley Homes.',
		'/articles/sunset_heights_news.pdf',
		NOW(),
		NOW()
	),
	(
		2,
		1,
		'/maps/green_valley_homes_map.png',
		'Locality guide for parks and hospitals.',
		'Compare with Sunset Heights and Skyline Towers.',
		'Developer: Green Builders. Known for eco-friendly designs.',
		'Is this area safe for families?',
		'Projects by Green Builders: Eco Park Residences.',
		'Similar projects: Sunset Heights, Skyline Towers.',
		'Recently added: Hilltop Villas.',
		'Resale project available: 3BHK in Green Valley Homes.',
		'New project: Oceanview Residences.',
		'/articles/green_valley_homes_news.pdf',
		NOW(),
		NOW()
	),
	(
		3,
		2,
		'/maps/skyline_towers_map.png',
		'Guide to nearby shopping and transport links.',
		'Compare with Oceanview Residences and Hilltop Villas.',
		'Developer: Skyline Developers. Specializes in luxury homes.',
		'What is the expected possession date?',
		'Projects by Skyline Developers: Sunset Heights, Green Valley Homes.',
		'Similar projects: Hilltop Villas, Oceanview Residences.',
		'Recently added: Green Valley Homes.',
		'Resale project available: Penthouse in Skyline Towers.',
		'New project: Hilltop Villas.',
		'/articles/skyline_towers_news.pdf',
		NOW(),
		NOW()
	),
	(
		4,
		2,
		'/maps/oceanview_residences_map.png',
		'Locality advantages near beaches and resorts.',
		'Compare with Hilltop Villas and Sunset Heights.',
		'Developer: Ocean Builders. Focused on waterfront properties.',
		'Are there any ongoing promotions?',
		'Projects by Ocean Builders: Beachfront Estates.',
		'Similar projects: Skyline Towers, Green Valley Homes.',
		'Recently added: Sunset Heights.',
		'Resale project available: 2BHK in Oceanview Residences.',
		'New project: Skyline Towers.',
		'/articles/oceanview_residences_news.pdf',
		NOW(),
		NOW()
	),
	(
		5,
		3,
		'/maps/hilltop_villas_map.png',
		'Guide to hiking trails and nature parks nearby.',
		'Compare with Oceanview Residences and Green Valley Homes.',
		'Developer: Hilltop Developers. Renowned for scenic views.',
		'What are the financing options available?',
		'Projects by Hilltop Developers: Mountain View Estates.',
		'Similar projects: Oceanview Residences, Skyline Towers.',
		'Recently added: Oceanview Residences.',
		'Resale project available: Villa in Hilltop Villas.',
		'New project: Sunset Heights.',
		'/articles/hilltop_villas_news.pdf',
		NOW(),
		NOW()
	);