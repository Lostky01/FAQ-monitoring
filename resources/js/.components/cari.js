import React from "react";

const HomeMenu = () => {
  return (
    <form>
      <label htmlFor="search">Search:</label>
      <input type="text" id="search" name="search" placeholder="Enter your search query" />

      <label htmlFor="menu">Select an option:</label>
      <select id="menu" name="menu">
        <option value="option1">Option 1</option>
        <option value="option2">Option 2</option>
        <option value="option3">Option 3</option>
      </select>

      <button type="submit">Submit</button>
    </form>
  );
};

export default HomeMenu;
