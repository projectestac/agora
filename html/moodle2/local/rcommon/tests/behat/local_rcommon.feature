@local @local_rcommon @wip
Feature: Marsupial common features
In order to configure Marsupial
  As a manager
  I can add publishers and books to the module

  Scenario: Add publishers
  	Given I log in as "admin"
  	And I navigate to "Manage suppliers" node in "Site administration > Remote resource manager"
    And I click on "Add new publisher" "link_or_button"
    And I set the following fields to these values:
      | Name | Departament |
      | Authentication web services address | http://mps-xtec.educat1x1.cat/ws/wsAuthentication/wsAuthentication.php |
      | Book structure web services address | http://mps-xtec.educat1x1.cat/ws/wsBooksStructure/wsBooksStructure.php |
      | Username | S1mul4d0r |
      | Password | ed1t0r14l |
    When I press "Save changes"
    Then I should see "Saved correctly"
    And I should not see "Unable to save data, please try again"
    And I follow "Continue"
    Then I should see "Departament"
    And I navigate to "Departament" node in "Site administration > Remote resource manager > Contents"
    When I click on "Update books structures" "link_or_button"
    Then I should see "Updating Process finish correctly"
