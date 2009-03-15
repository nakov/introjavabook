CREATE TABLE introjavabook_bugs (
	bug_id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	sent_by VARCHAR(200),
	sender_email VARCHAR(100),
	sent_on TIMESTAMP DEFAULT NOW(),
	page_number VARCHAR(100),
	row_number VARCHAR(100),
	description TEXT,
	sender_agree_to_be_listed INTEGER
);

CREATE TABLE introjavabook_bug_comments (
	comment_id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	bug_id INTEGER NOT NULL,
	sent_by VARCHAR(200),
	sender_email VARCHAR(100),
	sent_on TIMESTAMP DEFAULT NOW(),
	comment TEXT
);

ALTER TABLE introjavabook_bug_comments 
ADD FOREIGN KEY (bug_id) REFERENCES introjavabook_bugs(bug_id);
