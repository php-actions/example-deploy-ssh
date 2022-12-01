Feature: I am personally greeted
	In order to feel welcomed
	As a user
	I should be greeted by my name when I provide it

	Scenario: Default name
		Given I am on the homepage
		Then I should see "Hello, you!"

	Scenario: Provide name
		Given I am on the homepage
		And I fill in "your-name" with "Cody"
		And I press "Greet!"
		Then I should see "Hello, Cody!"

	Scenario: Name persists
		Given I am on the homepage
		And I fill in "your-name" with "Cody"
		And I press "Greet!"
		When I reload the page
		Then I should see "Hello, Cody!"
		When I reload the page
		Then I should see "Hello, Cody!"
