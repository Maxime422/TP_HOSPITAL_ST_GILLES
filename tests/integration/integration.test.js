test("Exemple de test d'intégration", () => {
  const fetchData = () => ({ success: true });
  expect(fetchData().success).toBe(true);
});
