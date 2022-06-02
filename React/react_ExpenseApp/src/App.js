import React, { useState } from "react";

import NewExpense from "./compontents/NewExpense/NewExpense";
import Expenses from "./compontents/Expenses/Expenses";

  const DUMMY_EXPENSES = [
    {
      id: "e1",
      title: "PC Motherboard",
      amount: 75,
      date: new Date(2020, 1, 15),
    },
    {
      id: "e2",
      title: "Books",
      amount: 25,
      date: new Date(2020, 3, 17),
    },
    {
      id: "e3",
      title: "Car Insurance",
      amount: 85.5,
      date: new Date(2021, 10, 25),
    },
    {
      id: "e4",
      title: "O'Reilly Subscription",
      amount: 350,
      date: new Date(2022, 6, 2),
    },
  ];

  function App () {
    const [expenses, setExpenses] = useState(DUMMY_EXPENSES);

  const addExpenseHandler = (expense) => {
    setExpenses((prevExpenses) => {
      return [expense, ...prevExpenses];
    });
  };

  return (
    <div>
      <h1>ExpenseApp</h1>
      <NewExpense onAddExpense={addExpenseHandler}/>
      <Expenses items={expenses} />
    </div>
  );

};

export default App;
